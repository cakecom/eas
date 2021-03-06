<?php

namespace App\Http\Controllers\manager;

use App\Assessment;
use App\Http\Controllers\Controller;
use App\Quarter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function index()
    {
        $quarter = Quarter::select('*')->where(['status' => 'true', 'success' => 0])->first();
        if (!empty($quarter)) {
            $employee = User::where('type', 0)->count();
            $count_forms = $employee * ($employee - 1);
            $assessed = Assessment::where('quarter_id', $quarter->id)->count();
            return view('manager/dashboard', compact('count_forms', 'assessed', 'quarter'));
        } else {
            return view('empty');
        }

    }

    public function details(Request $request)
    {

        $details = Assessment::find($_GET['id'])->toArray();
        return $details;
    }

    public function sendDirector(Request $request)
    {
        $quarter = Quarter::select('*')->where(['status' => 'true', 'success' => 0])->first();
        $sendDirector = new \App\Request([
            'user_id' => $request->id,
            'status' => 'Pending',
            'quarter_id' => $quarter->id,
            'time_manage' =>$request->time_manage,
            'quality' =>$request->quality,
            'creativity' =>$request->creativity,
            'team_work' =>$request->team_work,
            'discipline' =>$request->discipline,
            'score' =>$request->score
        ]);
        $sendDirector->save();
        return "success";
    }

    public function getAssessment()
    {
        $quarter = Quarter::select('*')->where(['status' => 'true', 'success' => 0])->first();
        $score = Assessment::select(DB::raw("count(user_id)user,sum(time_management)T,
        sum(quality_of_work)Q,sum(quality_of_work)Q,sum(creativity)C,
        sum(team_work)W,sum(discipline)D,sum(score)N,user_id"))
            ->where('quarter_id', $quarter->id)
            ->groupBy('user_id')->get();
        $output = '';
        $output .= '
        <table id="user_table" class="table table-bordered table-striped"
                                   style="margin:auto;border-width: thin;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Time management</th>
                                    <th>Quality of work</th>
                                    <th>Creativity</th>
                                    <th>Team work</th>
                                    <th>Discipline</th>
                                    <th>Score<br>(max=20)</th>
                                    <th>Action</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>';
        foreach ($score as $row) {
            $output .= '        
                                    <tr>
                                        <th>' . $row->users['name'] . '</th>
                                        <th>' . $row->T / $row->user . '</th>
                                        <th>' . $row->Q / $row->user . '</th>
                                        <th>' . $row->C / $row->user . '</th>
                                        <th>' . $row->W / $row->user . '</th>
                                        <th>' . $row->D / $row->user . '</th>
                                        <th>' . $row->N / $row->user . '</th>
                                        <th>
                                        ';
            if (is_null($row->request['status'])) {
                $output .= '
                                            <button type="button" id="details" class="btn btn-block btn-info"
                                            data-time_manage="' . $row->T . '" data-quality="' . $row->Q . '"
                                            data-creativity="' . $row->C . '" data-team_work="' . $row->W . '"
                                            data-discipline="' . $row->D . '" data-score="' . $row->N . '"
                                             data-name="' . $row->users['name'] . '"  data-id="' . $row->user_id . '">
                                                Present Director
                                            </button>
                                        </th>
                                        <th>' . $row->request['status'] . '</th>
                                    </tr>
                         ';
            } else {
                $output .= '
                                            <button type="button" id="details" class="btn btn-block btn-info  disabled"  disabled >
                                                Present Director
                                            </button>
                                        </th>
                                        <th>' . $row->request['status'] . '</th>
                                    </tr>
                         ';
            }
        }
        $output .= '             
                                </tbody>
                            </table>
               ';
        return $output;
    }
}

<?php

namespace App\Http\Controllers\manager;

use App\Assessment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function index()
    {
//        $score = Assessment::select(DB::raw("count(user_id)user,sum(time_management)T,
//        sum(quality_of_work)Q,sum(quality_of_work)Q,sum(creativity)C,
//        sum(team_work)W,sum(discipline)D,sum(score)N,user_id"))
//            ->groupBy('user_id')->get();
        $employee = User::where('type', 0)->count();
        $count_forms = $employee * ($employee - 1);
        $assessed = Assessment::count();
        return view('manager/dashboard', compact('count_forms', 'assessed'));

    }

    public function details(Request $request)
    {

        $details = Assessment::find($_GET['id'])->toArray();
        return $details;
    }

    public function sendDirector(Request $request)
    {
        $sendDirector = new \App\Request([
            'user_id' => $request->id,
            'status' => 'Pending'
        ]);
        $sendDirector->save();
        return "success";
    }

    public function getAssessment()
    {
        $score = Assessment::select(DB::raw("count(user_id)user,sum(time_management)T,
        sum(quality_of_work)Q,sum(quality_of_work)Q,sum(creativity)C,
        sum(team_work)W,sum(discipline)D,sum(score)N,user_id"))
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
                                        <th>' . $row->D / $row->user . '</th>
                                        <th>' . $row->W / $row->user . '</th>
                                        <th>' . $row->N / $row->user . '</th>
                                        <th>
                                        ';
                                    if(is_null($row->request['status'])){
            $output.='
                                            <button type="button" id="details" class="btn btn-block btn-info" data-name="'.$row->users['name'].'"  data-id="'.$row->user_id.'">
                                                Present Director
                                            </button>
                                        </th>
                                        <th>' . $row->request['status'] . '</th>
                                    </tr>
                         ';
        }else{
                                        $output.='
                                            <button type="button" id="details" class="btn btn-block btn-info  disabled"  disabled >
                                                Present Director
                                            </button>
                                        </th>
                                        <th>' . $row->request['status'] . '</th>
                                    </tr>
                         ';
                                    }
        }
               $output.='             
                                </tbody>
                            </table>
               ';
        return $output;
    }
}

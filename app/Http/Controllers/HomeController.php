<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Quarter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->Director()) {
            return view('director/dashboard');
        } elseif (auth()->user()->Manager()) {
            return view('manager/dashboard');
        } else {
            $quarter=Quarter::select('*')->where(['status'=>'true','success'=>0])->first();
            if(!empty($quarter)) {
                $assessed = Assessment::select('user_id')->where('quarter_id',$quarter['id'])->get()->toarray();

                if (count($assessed) > 0) {
                    $array = array();
                    foreach ($assessed as $data) {
                        $array[] = $data['user_id'];
                    }
                    $not_assessed = DB::table('users')->where('id', '!=', 3)
                        ->where('type', '=', '0')
                        ->whereRaw('id  NOT IN(' . implode(',', ($array)) . ')')
                        ->get();
                } else {
                    $not_assessed = DB::table('users')->where('id', '!=', 3)
                        ->where('type', '=', '0')
                        ->get();

                }
                if (request()->ajax()) {
                    return datatables()->of($not_assessed)->addColumn('action', function ($data) {
                        $button = '<button type="button" name="insert" id="insert" class="edit btn btn-primary btn-sm"
 data-id="' . $data->id . '" data-toggle="modal" data-target="#modal-info">Evaluate</button>';
                        return $button;
                    })
                        ->rawColumns(['action'])
                        ->make(true);
                }
                return view('home',compact('quarter'));
            }else{
                return view('empty');
            }
        }
    }

    public function count_assessment()
    {
        $quarter=Quarter::select('*')->where(['status'=>'true','success'=>0])->first();
        $assessed = Assessment::select('user_id')->where('quarter_id',$quarter['id'])->get()->toarray();
        $assessed_count = count($assessed);
        if (count($assessed) > 0) {
            $array = array();
            foreach ($assessed as $data) {
                $array[] = $data['user_id'];
            }
            $not_assessed = DB::table('users')->where('id', '!=', 3)
                ->where('type', '=', '0')
                ->whereRaw('id  NOT IN(' . implode(',', ($array)) . ')')
                ->count();
        } else {
            $not_assessed = DB::table('users')->where('id', '!=', 3)
                ->where('type', '=', '0')
                ->count();

        }
        $data = [
            'assessed' => $assessed_count,
            'not_assessed' => $not_assessed
        ];
        return $data;
    }

    public function store(Request $request)
    {
        $rules = array(
            'time_management' => 'required',
            'quality' => 'required',
            'creativity' => 'required',
            'team_work' => 'required',
            'discipline' => 'required',
            'user_id' => 'required'

        );

        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        $quarter=Quarter::select('*')->where(['status'=>'true','success'=>0])->first()->toArray();
        $score=$request->time_management+$request->quality+$request->creativity+$request->team_work+$request->discipline;
        $form_data = array(
            'time_management' => $request->time_management,
            'quality_of_work' => $request->quality,
            'creativity' => $request->creativity,
            'team_work' => $request->team_work,
            'discipline' => $request->discipline,
            'user_id' => $request->user_id,
            'score'=>$score,
            'quarter_id'=>$quarter['id']
        );

        Assessment::create($form_data);
        return response()->json(['success' => 'Data  successfully.']);
    }
}

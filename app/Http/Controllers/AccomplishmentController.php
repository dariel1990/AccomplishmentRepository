<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Accomplishments;

class AccomplishmentController extends Controller
{
    public function calendarAccomplishments(Request $request)
    {
        switch ($request->type) {
            case 'create':
            
                $this->validate($request, [
                    'office'                    => 'required',
                    // 'request_time'              => 'required',
                    // 'time_acted'                => 'required',
                    'category'                  => 'required',
                ], [
                    'office.required'           => 'Office is required.',
                    // 'request_time.required'     => 'You need to input time of request.',
                    // 'time_acted.required'       => 'You need to input time of action.',
                    'category.required'         => 'Select a category',
                ]);

                $request_date =  strtotime($request->request_date . ' ' . $request->request_time);
                $date_acted =  strtotime($request->date_acted . ' ' . $request->time_acted);
                $date_completed =  strtotime($request->date_completed . ' ' .  $request->time_completed);

                $accom = Accomplishments::create([
                    'user_id'           => $request->user_id,
                    'control_no'        => $request->control_no,
                    'office'            => $request->office,
                    'request_date'      => date('Y-m-d H:i:s', $request_date),
                    'date_acted'        => date('Y-m-d H:i:s', $date_acted),
                    'date_completed'    => date('Y-m-d H:i:s', $date_completed),
                    'problem'           => $request->problem ?? '',
                    'solution'          => $request->solution ?? '',
                    'requested_by'      => $request->requested_by ?? '',
                    'approved_by'       => $request->approved_by ?? '',
                    'category'          => $request->category,
                ]);

                return response()->json(['success' => true]);
            break;

            case 'edit':

                $this->validate($request, [
                    'office'                    => 'required',
                    // 'request_time'              => 'required',
                    // 'time_acted'                => 'required',
                    'category'                  => 'required',
                ], [
                    'office.required'           => 'Office is required.',
                    // 'request_time.required'     => 'You need to input time of request.',
                    // 'time_acted.required'       => 'You need to input time of action.',
                    'category.required'         => 'Select a category',
                ]);

                $request_date =  strtotime($request->request_date . ' ' . $request->request_time);
                $date_acted =  strtotime($request->date_acted . ' ' . $request->time_acted);
                $date_completed =  strtotime($request->date_completed . ' ' .  $request->time_completed);

                $accom = Accomplishments::where('id', $request->accomID)->get();

                foreach($accom as $accoms){
                    // Insert Record with As of.
                    $accoms->user_id            = $request->user_id;
                    $accoms->control_no         = $request->control_no;
                    $accoms->office             = $request->office;
                    $accoms->request_date       = date('Y-m-d H:i:s', $request_date);
                    $accoms->date_acted         = date('Y-m-d H:i:s', $date_acted);
                    $accoms->date_completed     = date('Y-m-d H:i:s', $date_completed);
                    $accoms->problem            = $request->problem ?? '';
                    $accoms->solution           = $request->solution ?? '';
                    $accoms->requested_by       = $request->requested_by ?? '';
                    $accoms->approved_by        = $request->approved_by ?? '';
                    $accoms->category           = $request->category;
                    $accoms->save();
                }
                return response()->json(['success' => true]);
            break;
            
            default:
                # ...
            break;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use Illuminate\Validation\Rule;

class AjaxController extends Controller
{

    public function get_invoice_details(Request $request)
    {
		$url = '';
		$patients = '';
		$message = 'Invoice not found';
		$status = 0;
        if(isset($request->inv_no))
        {
            $patients=Group::query()->with('patient')->where('inv_no','=',$request->inv_no)->first();
			if(isset($patients)){
				$status = 1;
				$message = 'Invoice Found';
				$url = route('admin.invoice_cancel_req',$patients->id);
			}
        }

		return response()->json(array('status'=>$status,'status'=>$status,'message'=>$message,'patients'=>$patients,'url'=>$url));

    }


    public function add_credits(PaymentRequest $request)
    {
        $record = Payments::create([
			'CustomerId' => $id,
			'Credits' => Crypt::encryptString($request->credits),
			'PaymentStatus' => $request->paymentStatus,
			'TransactionId' => $request->transactionId,
			'Comments' => $request->comments,
			'PaymentMethod' => $request->paymentMethod,
			'ByAdmin'=>1,
			'PaymentDtTm'=> \Carbon\Carbon::now()->format('Y-m-d h:i a'),
			'PaidDtTm'=> \Carbon\Carbon::now()->format('Y-m-d h:i a')
		]);

        $record=Payments::create($request->except('_token'));

        return response()->json($record);
    }

    /**
    * get online users
    *
    * @access public
    * @var  @Request $request
    */
    public function online()
    {
        $online_users=[];

        $users=\App\Models\User::all();

        foreach($users as $user)
        {
            $online=\Cache::get('user-'.$user['id']);
            if(!empty($online))
            {
                array_push($online_users,$user['id']);
            }
        }

        $online_users=\App\Models\User::whereIn('id',$online_users)
                                    ->where('id','!=',auth()->guard('admin')->user()['id'])
                                    ->get();

        return response()->json($online_users);
    }

    /**
    * get chat messages
    *
    * @access public
    * @var  @Request $request
    */
    public function get_chat($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['id']]
        ])->orWhere([
            ['to',$id],['from',auth()->guard('admin')->user()['id']]
        ])->orderBy('id','desc')->take(20)->get();

        $to_chats=Chat::where([['from',$id],['to',auth()->guard('admin')->user()['id']]])->get();

        foreach($to_chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * get chat unread messages
    *
    * @access public
    * @var  @Request $request
    */
    public function chat_unread($id)
    {
        $chats=Chat::with('from_user')->where([
            ['from',$id],['to',auth()->guard('admin')->user()['id']]
        ])->where('read',0)
        ->get();

        foreach($chats as $chat)
        {
            $chat->update(['read'=>1]);
        }

        return response()->json($chats);
    }

    /**
    * send message
    *
    * @access public
    * @var  @Request $request
    */
    public function send_message(Request $request,$id)
    {
        $chat=Chat::create([
            'from'=>auth()->guard('admin')->user()['id'],
            'to'=>$id,
            'message'=>$request->message
        ]);

        return $chat;
    }


    /**
    * Change visit status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_visit_status($id)
    {
        $visit=Visit::find($id);

        $visit->update([
            'read'=>true,
            'status'=>($visit['status'])?false:true,
        ]);

        return response()->json(__('Visit status updated successfully'));
    }

    /**
    * Change lang status
    *
    * @access public
    * @var  @Request $request
    */
    public function change_lang_status($id)
    {
        $lang=Language::find($id);

        $lang->update([
            'active'=>($lang['active'])?false:true,
        ]);

        return response()->json(__('Language status updated successfully'));
    }


    public function get_unread_messages(Request $request)
    {
        $messages=Chat::with('from_user')->where('to',auth()->guard('admin')->user()['id'])->where('read',false)->get();

        return response()->json($messages);
    }

    /**
    * get unread mesasges count
    *
    * @access public
    * @var  @Request $request
    */
    public function get_unread_messages_count($user_id)
    {
        $count=Chat::with('from_user')->where([['to',auth()->guard('admin')->user()['id']],['from',$user_id]])->where('read',false)->count();

        return $count;
    }

    /**
    * load more messages
    *
    * @access public
    * @var  @Request $request
    */
    public function load_more($user_id,$message_id)
    {
        $chats=Chat::with(['from_user','to_user'])->where(function($q)use($user_id){
            return $q->where([
                ['to',$user_id],['from',auth()->guard('admin')->user()['id']]
            ])->orWhere([
                ['from',$user_id],['to',auth()->guard('admin')->user()['id']]
            ]);
        })->where('id','<',$message_id)->orderBy('id','desc')->take(10)->get();

        return response()->json($chats);

    }

    /**
    * get my messages to user
    *
    * @access public
    * @var  @Request $request
    */
    public function get_my_messages($id)
    {
        $chats=Chat::where([['from',auth()->guard('admin')->user()['id']],['to',$id]])->orderBy('id','desc')->take(20)->get();

        return response()->json($chats);
    }

    /**
    * get new visits
    *
    * @access public
    * @var  @Request $request
    */
    public function get_new_visits()
    {
        $visits=Visit::where('read',false)->orderBy('id','desc')->with('patient')->get();

        return response()->json($visits);

    }
    

}




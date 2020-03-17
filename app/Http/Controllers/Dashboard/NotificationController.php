<?php


namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
class NotificationController extends Controller
{
    public function send(Request $request) {

        $title = $request->title;
        $sub_title = $request->sub_title;
        $token = Notification::select('*')->pluck('fcm_token')->toArray();
        $this->send_notification($title ,$sub_title ,  $token  );
        return redirect()->route('dashboard.markets.index');


    }




    function send_notification($title ,$subTitle , $token  ){

            define( 'API_ACCESS_KEY', 'AAAAFUzxYHM:APA91bFDFpkN4vRvK2NH4kioG5XXwYzU3PEG2K2M4tApZrlIQJFShQP_hCrjnhv-aZWFqbHRzCVpewfeT1klD3Itm36hd8hmra1Yr_Sh8ach6xs9Ypm4RwVxHfJBJ1_KtM1QGF9OIkYy');
    $msg = array
          (
		'body' 	=> $title,
		'title'	=> $subTitle,

          );
	$fields = array
			(
				'to'=>implode($token)  ,
				'notification'	=> $msg
			);


	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

		$result = curl_exec($ch );
		echo $result;
        curl_close( $ch );


}


public function create()
{
    return view('dashboard.notificationes.create');

}
}

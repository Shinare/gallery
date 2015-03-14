<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

    public function teamspeak(Request $request)
    {
        /*$cmd = '/home/ec2-user/teamspeak/teamspeak3-server_linux-amd64/ts3server_startscript.sh start';
        exec($cmd, $output, $exitCode);
        if ($exitCode != 0) {
            trigger_error("Command \"$cmd\" failed with exit cololde $exitCode:".
                join("\n", $output), E_USER_ERROR);
        }*/
        /*$output = shell_exec('/home/ec2-user/teamspeak/teamspeak3-server_linux-amd64/ts3server_startscript.sh start');*/

        $command = $request->input('command');
        if($command=="")
            {$command = "Status";}
        $output = shell_exec('../../../scripts/ts_'.$command.' 2>&1');
        return view('ts')->with('output',$output);
    }

}

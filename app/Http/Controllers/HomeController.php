<?php

namespace App\Http\Controllers;

use App\Applications;
use App\Call;
use App\Question;
use App\Reviews;
use Illuminate\Http\Request;

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
        $applications = new Applications();
        $calls = new Call();
        $reviews = new Reviews();
        $questions = new Question();
        return view('home', ['appli' => $applications->all(), 'calls' => $calls->all(), 'reviews' => $reviews->all(),'questions' => $questions->all()]);
    }


    public function appProcessing($id)
    {
        $application =  Applications::find($id);
        date_default_timezone_set('europe/moscow');
        $application->update([

            'processed' => true,
            'dateProcessing' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('home')->with('success');
    }
    public function callProcessing($id)
    {
        $call =  Call::find($id);
        date_default_timezone_set('europe/moscow');
        $call->update([
            'processed' => true,
            'dateProcessing' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->route('home')->with('success');
    }
    public function addApp()
    {
        $TOKEN = '5702325943:AAHb_-L-aMshvdOBqxrRLru4l-1l-BbjF-o';
        $CHATID = '-577996329';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $textSendStatus = '';

            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['date']) && !empty($_POST['time'])) {
                if (
                    $_POST['from'] != '-1' && $_POST['to'] != '-1' && $_POST['rate'] != '-1'
                    && $_POST['count'] != '-1'
                ) {
                    $txt = "";
                    if (isset($_POST['name']) && !empty($_POST['name'])) {
                        $txt .= "Имя: " . strip_tags(trim(urlencode($_POST['name']))) . "%0A";
                    }
                    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
                        $txt .= "Телефон: " . strip_tags(trim(urlencode($_POST['phone']))) . "%0A";
                    }
                    if (isset($_POST['date']) && !empty($_POST['date'])) {
                        $txt .= "Дата: " . strip_tags(trim(urlencode($_POST['date']))) . "%0A";
                    }
                    if (isset($_POST['time']) && !empty($_POST['time'])) {
                        $txt .= "Время: " . strip_tags(trim(urlencode($_POST['time']))) . "%0A";
                    }
                    if (isset($_POST['from'])) {
                        $txt .= "Откуда: " . $_POST['from'] . "%0A";
                    }

                    if (isset($_POST['to'])) {
                        $txt .= "Куда: " . $_POST['to'] . "%0A";
                    }

                    if (isset($_POST['rate'])) {
                        $txt .= "Тариф: " . $_POST['rate'] . "%0A";
                    }
                    if (isset($_POST['count'])) {
                        $txt .= "Количество человек: " . $_POST['count'] . "%0A";
                    }
                    if (isset($_POST['child'])) {
                        $txt .= "Наличие детей: " . $_POST['child'] . "%0A";
                    }
                    if (isset($_POST['animals'])) {
                        $txt .= "Наличие животных: " . $_POST['animals'] . "%0A";
                    }
                    if (isset($_POST['notes']) && !empty($_POST['notes'])) {
                        $txt .= "Примечания: " . strip_tags(trim(urlencode($_POST['notes']))) . "%0A";
                    }
                    date_default_timezone_set('europe/moscow');
                    $app = new Applications();
                    $app->insert([
                        'name' => $_POST['name'],
                        'phone' => $_POST['phone'],
                        'date' => $_POST['date'],
                        'time' => $_POST['time'],
                        'appFrom' => $_POST['from'],
                        'appTo' => $_POST['to'],
                        'appRate' => $_POST['rate'],
                        'count' => $_POST['count'],
                        'child' => $_POST['child'],
                        'animals' => $_POST['animals'],
                        'notes' => $_POST['notes'],
                        'dateSent' => date('Y-m-d H:i:s'),
                        'processed' => false,
                        'dateProcessing' => null,

                    ]);
                    $textSendStatus = @file_get_contents('https://api.telegram.org/bot' . $TOKEN . '/sendMessage?chat_id=' . $CHATID . '&parse_mode=html&text=' . $txt);
                    if (isset(json_decode($textSendStatus)->{'ok'}) && json_decode($textSendStatus)->{'ok'}) {
                        echo json_encode('SUCCESS');
                    } else {
                        echo json_encode('ERROR');
                    }
                } else {
                    echo json_encode('NOTVALID');
                }
            } else {
                echo json_encode('NOTVALID');
            }
        } else {
            header("Location: /");
        }
    }

    public function updateApp($id)
    {
        $app = new Applications();
        return view('updateApp', ['app' => $app->find($id)]);
    }

    public function updateAppSubmit($id, Request $request)
    {
        $app =  Applications::find($id);

        $app->update([
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'date' => $_POST['date'],
            'time' => $_POST['time'],
            'appFrom' => $_POST['appFrom'],
            'appTo' => $_POST['appTo'],
            'appRate' => $_POST['rate'],
            'count' => $_POST['count'],
            'child' => $_POST['child'],
            'animals' => $_POST['animals'],
            'notes' => $_POST['notes'],
        ]);


        return redirect()->route('home')->with('success');
    }
}

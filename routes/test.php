<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceLogController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\DeviceCameraController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Shift\AutoShiftController;
use App\Http\Controllers\Shift\FiloShiftController;
use App\Http\Controllers\Shift\MultiInOutShiftController;
use App\Http\Controllers\Shift\NightShiftController;
use App\Http\Controllers\Shift\RenderController;
use App\Http\Controllers\Shift\SingleShiftController;
use App\Mail\ReportNotificationMail;
use App\Models\Attendance;
use App\Models\Device;
use App\Models\Employee;
use App\Models\ReportNotification;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log as Logger;


Route::get('/syncLogsScript', function (Request $request) {

    // return [
    //     (new FiloShiftController)->render(),
    //     (new SingleShiftController)->render()
    // ];


    // return (new RenderController)->renderAuto($request);




    // return [
    //     "MultiInOut" => (new MultiInOutShiftController)->processByManual($request),
    //     // "Single" => (new SingleShiftController)->processByManual($request),
    //     // "Auto" => (new AutoShiftController)->processByManual($request)
    // ];
});
Route::get('/donwloadpdffile', function (Request $request) {


    return  $model = ReportNotification::with(["managers", "company.company_mail_content"])->where("id", 43)->first();

    // // Define the path to the file in the public folder
    // $filePath = Storage::url('app/payslips/8/8_3_8_2023_payslip.pdf');;;

    // $filePath = storage_path('app/payslips/8/8_3_8_2023_payslip.pdf');

    // // Check if the file exists
    // if (file_exists($filePath)) {
    //     // Create a response to download the file
    //     return response()->download($filePath, 'myfile.pdf');
    // } else {
    //     // Return a 404 Not Found response if the file doesn't exist
    //     return 'File not exist';
    //  }
});
Route::get("/testemployee", function (Request $request) {

    return Storage::url('8_3_8_2023_payslip.pdf');

    $data = (new EmployeeController)->getSingleEmployeeProfileAll();


    return  View('pdf.test', ["employees" => $data]);; //->donwload();
});
Route::get('/donwloadfile', function (Request $request) {
    // Define the path to the file in the public folder
    $filePath = Storage::url('app8_3_8_2023_payslip.pdf');; //public_path("1666190454.jpg");

    // Check if the file exists
    if (file_exists($filePath)) {
        // Create a response to download the file
        return response()->download($filePath, 'myfile.png');
    } else {
        // Return a 404 Not Found response if the file doesn't exist
        abort(404);
    }
});
Route::get('/handleNotification', function (Request $request) {

    $test = new DeviceController();
    return  $test->handleNotification(8);
});
Route::get('/test/test/3', function (Request $request) {



    // return  $response = Http::withoutVerifying()->get("https://ezwhat.com/api/send.php", [
    //     'number' => "919701226007",
    //     'type' => 'text',
    //     'message' => "Hello",
    //     'instance_id' => "650300B673EFA",
    //     'access_token' => "a27e1f9ca2347bb766f332b8863ebe9f",
    // ]);


    return defaultCards();

    Logger::channel('custom')->info('This is a custom log message.');

    return;

    $filePath = Storage::path("data.csv"); // replace with the path to your CSV file

    // Open the CSV file
    $file = fopen($filePath, 'r');

    // Read the CSV file and convert it to an array
    $data = [];
    $header = fgetcsv($file); // Get the header row
    while (($row = fgetcsv($file)) !== false) { // Loop through the remaining rows
        $data[] = array_combine($header, $row); // Combine the header row with the current row
        list($num, $msg) = $row;
        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
        ])->get("https://ezwhat.com/api/send.php?number={$num}&type=text&message={$msg}&instance_id=64466B01B7926&access_token=a27e1f9ca2347bb766f332b8863ebe9f");

        // check if the request was successful
        if ($response->ok()) {
            $request["status"] = true;
            $request["message"] = "success";
        } else {
            $request["status"] = false;
            $request["message"] = "false";
        }
    }

    // Close the CSV file
    fclose($file);

    return $data;

    // Use the $data array as needed
    foreach ($data as $row) {
        $num = $row['number'];
        $msg = $row['message'];
        // Process the data
    }

    return;

    $Attendance = new AttendanceController;
    return $result = $Attendance->syncLogsScript();

    die;

    // if($request->company_id) {
    //     $user_ids = Employee::where("company_id", "=",$request->company_id)->pluck("user_id");
    //     return User::whereIn("id",$user_ids)->update(["company_id" => $request->company_id]);
    // }

    echo phpversion();

    echo "<br>";

    $one = 1;
    $arr1 = [&$one, 2, 3];
    $arr2 = [0, ...$arr1];
    var_dump($arr2);

    die;

    $data = [
        "from" => "14157386102",
        "to" => "971502848071",
        "message_type" => "text",
        "text" => "This is a WhatsApp Message sent from the ideahrms",
        "channel" => "whatsapp",
    ];

    // return (new WhatsappController)->toSendNotification($data);
    // WhatsappJob::dispatch($data);
    return 'done';
    // $newLog[] = [
    //     "out" => "01:01",
    // ];

    // $attendance = Attendance::where('date', '2022-12-19')->where('employee_id', 681);
    // $found = $attendance->first();

    // $oldLog = $found->logs;

    // return [
    //     $oldLog, $newLog
    // ];

    // $result = array_merge($oldLog, $newLog);

    // $found->logs = $result;
    // return $found->save();

    // // return   $found ? $attendance->update($items) : Attendance::create($items);

    // return $request->user();
    // return $dd = Auth::user();
    // return "Awesome APIs";
});

Route::get('/open_door', function (Request $request) {

    $curl = curl_init();

    $device_id = $request->device_id;

    // $device_id = 'OX-8862021010076';

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://139.59.69.241:5000/$device_id/OpenDoor",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    // return "Awesome APIs";
});

Route::post('/upload-users', function (Request $request) {

    try {

        $url = "https://sdk.ideahrms.com/{$request->device_id}/AddPerson";

        $request["expiry"] = "2089-12-31 23:59:59";

        // make the POST request using Laravel's HTTP client

        $response = Http::withoutVerifying()->withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $request->all());

        // check if the request was successful
        if ($response->ok()) {
            $request["status"] = true;
            $request["message"] = $request->name . " " . "has been uploaded to " . $request->device_id;
        } else {
            $request["status"] = false;
            $request["message"] = $request->name . " " . "cannot upload to " . $request->device_id;
            // ...
        }
    } catch (\Throwable $th) {
        $request["status"] = false;
        $request["message"] = $request->name . " " . "cannot upload to " . $request->device_id;
    }

    if ($response["status"] == 102 || $response["status"] == 103) {
        $request["status"] = false;
        $request["message"] = "The device is not connected to the server or is not registered.";
    }

    return $request->all();
});

Route::get('/open_door_always', function (Request $request) {

    $curl = curl_init();

    $device_id = $request->device_id;

    // $device_id = 'OX-8862021010076';

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://139.59.69.241:5000/$device_id/HoldDoor",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    // return "Awesome APIs";
});

Route::get('/check_device_health_old', function (Request $request) {

    $devices = Device::pluck("device_id");

    $total_iterations = 0;
    $online_devices_count = 0;
    $offline_devices_count = 0;

    foreach ($devices as $device_id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(

            // CURLOPT_URL => "https://sdk.ideahrms.com/CheckDeviceHealth/$device_id",
            // CURLOPT_URL => "http://139.59.69.241:5000/CheckDeviceHealth/$device_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $status = json_decode($response)->status;

        if ($status !== 200) {
            $offline_devices_count++;
        } else {
            $online_devices_count++;
        }

        Device::where("device_id", $device_id)->update(["status_id" => $status == 200 ? 1 : 2]);

        $total_iterations++;
    }

    echo "$offline_devices_count Devices offline. $online_devices_count Devices online. $total_iterations records found.";
});


function checkSDKServerStatus($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    return $httpCode;
}

Route::get('/checkSDKServerStatus/{url}', function ($url) {
    return checkSDKServerStatus($url) ? "Server is running" : "Server is down";
});

Route::get('/close_door', function (Request $request) {

    $curl = curl_init();

    $device_id = $request->device_id;

    // $device_id = 'OX-8862021010076';

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://139.59.69.241:5000/$device_id/CloseDoor",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;

    // return "Awesome APIs";
});

// Route::post('/generate_log', [AttendanceLogController::class, 'GenerateLog']);
Route::get('/cameraevents', [CameraController::class, 'readLog']);
Route::post('/cameraevents', [CameraController::class, 'readLog']);

Route::get('/cameraevents-xml', [CameraController::class, 'readXml']);


Route::get('/generate_attendance_log', function (Request $request) {

    $arr = [];
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 13; $j <= 13; $j++) {
            for ($k = 1; $k <= 1; $k++) {
                $time = rand(8, 20);
                $time = $time < 10 ? '0' . $time : $time;
                $arr[] = [
                    'UserID' => $i,
                    'LogTime' => "2022-10-$j $time:00:00",
                    'DeviceID' => "OX-8862021010097",
                    'company_id' => "1",
                ];
            }
        }
    }
    // return $arr;
    DB::table('attendance_logs')->insert($arr);
});

Route::get('/test-re', function (Request $request) {
    // Employee::truncate();
    // DB::statement('DELETE FROM users WHERE id > 2');

    // return 'done';
});

Route::get('/test-date', function (Request $request) {

    // $start = date('Y-m-d');
    // $end = date('Y-m-d');

    $start = date('Y-m-1'); // hard-coded '01' for first day
    $end = date('Y-m-t');

    $model = Attendance::query();
    return $model->whereBetween('date', [$start, $end])
        ->get();

    return 'done';
});

Route::get('/storage', function (Request $request) {
    Storage::put('example.csv', 'francis');
});

Route::post('/upload', function (Request $request) {
    $file = $request->file->getClientOriginalName();
    $request->file->move(public_path('media/employee/file/'), $file);
    return $product_image = url('media/employee/file/' . $file);
    $data['file'] = $file;
});

Route::get('/test/whatsapp', function () {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v14.0/102482416002121/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
                        "messaging_product": "whatsapp",
                        "to": "923108559858",
                        "type": "template",
                            "template": {
                                "name": "hello_world",
                                "language": {
                                    "code": "en_US"
                                }
                            }
                        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer EAAP9IfKKSo0BALkTWKQE6xLcyfO3eyGt69Y7SH6EfpCmKCAGb1AZCuptzmnPf5qsRZBaj4WYqSXbbxDEvaOD6WiiFwklq4P0FvASsBYOigDTrEhC3geXTNLFZCzQ1wTxNthkfzI4wSfG0KF79rrvh7cEIKdyx7mvM4ZC06MHNZBYg78yYrfGZCIcbtDUnegflDudZB5e2i9AZBDCIJ81o2xa',
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
});
Route::get('/testAttendance', function () {

    // return 'Test';
    // $devicesListArray = Device::where("company_id", 8);

    // return $devicesListArray->clone()->where("device_id", "=", 'OX-9662022091021')->pluck('id')[0];
    // return (new AttendanceController)->seedDefaultData(20, [], '');
});
Route::get('/getActiveSessionId', function () {

    //return (new DeviceCameraController())->getActiveSessionId();
    return (new DeviceCameraController(''))->getActiveSessionId();
});
Route::get('/pushUserToCameraDevice', function () {

    //return (new DeviceCameraController())->getActiveSessionId();
    // Get the image data from the URL
    $imageData = file_get_contents("https://backend.mytime2cloud.com/media/employee/profile_picture/1696868606.jpg");

    if ($imageData !== false) {
        // Convert the image data to base64 format
        $imageData = base64_encode($imageData);
        return (new DeviceCameraController(''))->pushUserToCameraDevice("Venu1",  "9191",  $imageData);
    }
});
Route::get('/updateCameraDeviceLiveStatus', function () {

    //return (new DeviceCameraController())->getActiveSessionId();
    return (new DeviceCameraController(''))->updateCameraDeviceLiveStatus();
});

Route::get('/writeLastAttendanceLogTime', function () {
    return (new AttendanceLogController)->writeLastAttendanceLogTime('', '');
});
Route::get('/verifyDuplicate', function () {
    return (new AttendanceLogController)->store();
});


Route::get('/nightshift', function () {
    // return (new NightShiftController)->render();
});
Route::post('/cameratesting', function (Request $request) {

    $requestData = $request->all();
    //return $request;
    $requstJson = json_encode($requestData);


    DB::table('test_camera_api')
        ->insert([
            'json_content' => $requstJson,
        ]);
});
Route::get('/test_attachment', function () {
    $test = new RenderController();
    return  $test->renderOffCron(8);

    return  $model = ReportNotification::with(["managers", "company.companyMailContent"])->where("id", "8")->first();

    $models = ReportNotification::get();

    foreach ($models as $model) {

        return $model;

        if ($model->frequency == "Daily") {
            if (in_array("Email", $model->mediums)) {
                Mail::to($model->tos)
                    ->cc($model->ccs)
                    ->bcc($model->bccs)
                    ->queue(new ReportNotificationMail($model));
            }
            // if (in_array("Whatsapp", $model->mediums)) {
            //     Mail::to($model->tos)->send(new TestMail($model));
            // }
        }
    }
    return "done";
});

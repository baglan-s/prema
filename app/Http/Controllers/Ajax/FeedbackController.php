<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ClientTemplate;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function sendTemplate(Request $request)
    {
        $response = [
            'msg' => false
        ];

        if ($request->has(['name', 'email'])) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($file = $request->file('file')) {
                $file_path = 'client-templates/' . $data['email'] . '/' . time() . '_' . $file->getClientOriginalName();
                $file->move('client-templates/' . $data['email'] . '/', time() . '_' . $file->getClientOriginalName());
                $data['file'] = $file_path;
            }

            if ($request->has('msg')) {
                $data['msg'] = $request->msg;
            }

            try {
                Mail::to(env('MAIL_USERNAME'))->send(new ClientTemplate($data));
            }
            catch (\Exception $e) {
                $response['msg'] = $e->getMessage();
            }

        }
        echo json_encode(['response' => $response]);
        exit;
    }
}

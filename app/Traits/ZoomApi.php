<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ZoomApi
{
    // Zoom Api Generate Token
    public function generateToken()
    {
        $key = 'yXj_ljMrR9mBMXUnpoWEBw';
        $secret = '4ILce1QmfZgKwLjIIr4ljMuLIDGPeI2FGzOy';
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];
        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    public function create(Request $req)
    {
        $req->validate([
            'topic' => 'required|string',
            'start_time' => 'required|date',
            'agenda' => 'string|nullable',
        ]);
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
        $response = $client->request('POST', '/v2/users/me/meetings', [
            "headers" => [
                "Authorization" => "Bearer " . $this->generateToken(),
            ],
            'json' => [
                "topic" => $req->topic,
                "type" => 2,
                "start_time" => $req->start_time,
                "duration" => "30", // 30 mins
                "password" => "123456",
                "agenda" => $req->agenda,
            ],
        ]);
        $data = json_decode($response->getBody());
        if ($data) {
            return $data;
        }
        return (object)[];
    }

    public function cancelMeeting(Request $req)
    {
        $req->validate([
            'meetingId' => 'required|string',
        ]);
        try {
            $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
            $response = $client->request("DELETE", "/v2/meetings/$req->meetingId", [
                "headers" => [
                    "Authorization" => "Bearer " . $this->generateToken(),
                ]
            ]);
            if (204 == $response->getStatusCode()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteZoomMeeting(Request $req, $meeting_id)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
        $response = $client->request("DELETE", "/v2/meetings/$meeting_id", [
            "headers" => [
                "Authorization" => "Bearer " . $this->generateToken(),
            ]
        ]);

        if (204 == $response->getStatusCode()) {
            ZoomMeeting::where('meetingId', $meeting_id)->delete();
            return redirect(route('admin.zoom.meeting'))->with('Status', 'Meeting Deleted Success');
        }
    }
}

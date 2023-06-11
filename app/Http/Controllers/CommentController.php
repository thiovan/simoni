<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Comment;
use App\Models\Config;
use App\Models\Keyword;
use App\Models\KeywordMatch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sosmed_id'     => 'required',
            'device_name'   => 'required',
            'comments'      => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'message'   => 'Invalid request params',
                'data'      => null
            ], 400);
        }

        $account = Account::where([
            'uuid'      => $request->sosmed_id,
            'is_enable' => 1
        ])->first();

        if (!$account) {
            return response()->json([
                'success'   => false,
                'message'   => 'Sosmed not found or disabled',
                'data'      => null
            ], 400);
        }

        $keywords = Keyword::get();
        $config = Config::pluck('value', 'key');
        $admins = User::get();

        foreach ($request->comments as $comment) {
            $checkComment = Comment::where([
                'sender'    => $comment['username'],
                'text'      => json_encode($comment['comment']),
                'url'       => $comment['url']
            ])->first();
            if ($checkComment) {
                continue;
            }

            $matches = [];
            foreach ($keywords as $keyword) {
                $text = $keyword->text;
                if (preg_match("/\b{$text}\b/i", $comment['comment'])) {
                    array_push($matches, $keyword);
                }
            }

            if ($matches) {
                $datetime = new \DateTime($comment['datetime']);
                $datetime = $datetime->setTimezone(new \DateTimeZone('Asia/Jakarta'));

                $newComment = new Comment;
                $newComment->account_id = $account->id;
                $newComment->sender = $comment['username'];
                $newComment->text = json_encode($comment['comment']);
                $newComment->datetime = $datetime->format('Y-m-d H:i:s');
                $newComment->url = $comment['url'];
                $newComment->save();

                foreach ($matches as $match) {
                    $keywordMatch = new KeywordMatch;
                    $keywordMatch->comment_id = $newComment->id;
                    $keywordMatch->keyword_id = $match->id;
                    $keywordMatch->save();
                }

                // $message = "
                //     *⚠️ SI PANTAU ADUAN ⚠️*

                //     *Sumber:*
                //     _@{$account->username} ({$account->sosmed})_

                //     *Waktu:*
                //     _" . Carbon::parse($newComment->datetime)->format("d/m/Y H:i:s") . "_
                //     _" . Carbon::parse($newComment->datetime)->diffForHumans() . "_

                //     *Pengirim:*
                //     _@{$newComment->sender}_
                //     _https://www.instagram.com/{$newComment->sender}_

                //     *Komentar:*
                //     _" . json_decode($newComment->text) . "_

                //     *Keyword:*
                //     _" . implode(', ', array_column($matches, 'text')) . "_

                //     *Url:*
                //     _{$newComment->url}_
                // ";
                // $message = preg_replace('/^ +/m', '', $message);

                // $isSent = false;
                // foreach ($admins as $admin) {
                //     $response = Http::post("{$config->get('whatsapp_api')}/send/text", [
                //         "phone"     => $admin->phone,
                //         "message"   => $message
                //     ]);
                //     if ($response->successful()) {
                //         $isSent = true;
                //     }
                // }

                // if ($isSent) {
                //     $newComment->is_sent = 1;
                //     $newComment->save();
                // }
            }
        }

        return response()->json([
            'success'   => true,
            'message'   => 'Comments saved successfully',
            'data'      => []
        ]);
    }
}

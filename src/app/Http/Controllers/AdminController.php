<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;


class AdminController extends Controller
{
    public function admin(Request $request)
    {

        $contacts = Contact::with('category')
            ->keyword($request->input('keyword'))
            ->gender($request->input('gender'))
            ->category($request->input('category_id'))
            ->date($request->input('date'))
            ->paginate(7);

        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));

    }

    public function export(Request $request)
    {
        $response = new StreamedResponse(function () use ($request) {
            $handle = fopen('php://output', 'w');

            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, ['ID', '名前', '性別', 'カテゴリ', 'メールアドレス', '作成日']);

            $contacts = Contact::with('category')
                ->keyword($request->input('keyword'))
                ->gender($request->input('gender'))
                ->category($request->input('category_id'))
                ->date($request->input('date'))
                ->get();

            $genderList = [
                1 => '男性',
                2 => '女性',
                3 => 'その他',
            ];

            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->id,
                    $contact->first_name . ' ' . $contact->last_name,
                    $genderList[$contact->gender] ?? '未定義',
                    $contact->category?->content ?? '未定義',
                    $contact->email,
                    $contact->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        });

        $filename = 'contacts_' . date('Ymd_His') . '.csv';

        $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
        $response->headers->set('Content-Disposition', "attachment; filename={$filename}");

        return $response;
    }
}

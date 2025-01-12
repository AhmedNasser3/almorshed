<?php

namespace App\Http\Controllers\admin\choose;

use App\Http\Controllers\Controller;
use App\Models\admin\model\Choose;
use Illuminate\Http\Request;

class ChooseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'question' => 'required|string|max:255',
            'choices' => 'required|array',
        ]);

        $choose = Choose::create([
            'test_id' => $validated['test_id'],
            'question' => $validated['question'],
            'choices' => $validated['choices'], // سيتم تحويلها تلقائيًا إلى JSON
        ]);

        return redirect()->route('choose.index')->with('success', 'تم إضافة السؤال بنجاح');
    }

    public function edit($chooseId)
    {
        $choose = Choose::findOrFail($chooseId);

        return view('admin.pages.choose.edit', compact('choose'));
    }

    public function update(Request $request, $chooseId)
    {
        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',
            'question' => 'required|string|max:255',
            'choices' => 'required|array',
        ]);

        $choose = Choose::findOrFail($chooseId);
        $choose->update([
            'test_id' => $validated['test_id'],
            'question' => $validated['question'],
            'choices' => $validated['choices'],
        ]);

        return redirect()->route('choose.index')->with('success', 'تم تحديث السؤال بنجاح');
    }

    public function delete($chooseId)
    {
        $choose = Choose::findOrFail($chooseId);
        $choose->delete();

        return redirect()->route('choose.index')->with('success', 'تم مسح السؤال بنجاح');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\View\Components\Exports\TemplateList;
use App\Services\ExportsData\Repository\TestData;
use App\Services\ExportsData\ExportsDataService as ExportPDF;
use PDF;

class ExportsController extends Controller
{
    /**
     * Get templates list
     * @param  Request  $request
     * @param  integer  $teamId
     * @return \Illuminate\Http\JsonResponse
     */
    public function templates(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);

        $content = (new TemplateList($teamId))->toString();

        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }

    /**
     * Export current selected data
     * @param  Request $request
     * @param  int    $teamId
     * @return \Illuminate\Http\JsonResponse
     */
    public function current(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);
        $result = ExportPDF::make($teamId, 'exports.templates.current', $request->all());

        if ($result === false) {
             return response()->json([
                'success' => false,
            ]);
        }

        $content = $result;

        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }

    public function second(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);
        $result = ExportPDF::make($teamId, 'exports.templates.second', $request->all());

        if ($result === false) {
            return response()->json([
                'success' => false,
            ]);
        }

        $content = $result;

        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }

    public function third(Request $request, int $teamId)
    {
        $this->checkAccess($teamId);
        $result = ExportPDF::make($teamId, 'exports.templates.third', $request->all());

        if ($result === false) {
            return response()->json([
                'success' => false,
            ]);
        }

        $content = $result;

        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }

    public function export(Request $request, $template_name, int $teamId)
    {
        $this->checkAccess($teamId);
        $landscape = false;
        if (in_array($template_name, [4, 6, 7, 8, 9])) $landscape = true;
        $result = ExportPDF::make($teamId, 'exports.templates.' . $template_name, $request->all(), $landscape);

        if ($result === false) {
            return response()->json([
                'success' => false,
            ]);
        }

        $content = $result;

        return response()->json([
            'success' => true,
            'content' => $content,
        ]);
    }

    /**
     * Export pdf test
     * @param  string $type
     * @return mixes
     */
    public function test($type = 'html')
    {
        $template = 'exports.templates.test';

        $data = TestData::getData(1);
        $logo = TestData::getLogo();

        if ($type == 'html') {
            return view($template, compact('data','logo'));
        }

        $file = PDF::loadView($template, compact('data','logo'));

        return $file->stream();
    }

    /**
     * For access security purpose
     * @param  int    $teamId
     * @return mixed
     */
    protected function checkAccess(int $teamId)
    {
        if (! $user = Auth::user()
            or ! in_array($teamId, $user->teamIds())) {
            abort(403, "Forbidden!");
        }
        return true;
    }

}

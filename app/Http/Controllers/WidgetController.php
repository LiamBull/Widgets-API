<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWidget;
use App\Http\Requests\UpdateWidget;
use App\Http\Resources\Widget as WidgetResource;
use App\Models\Widget;
use Illuminate\Http\JsonResponse;

class WidgetController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(WidgetResource::collection(Widget::all()));
    }

    public function get(Widget $widget): JsonResponse
    {
        return response()->json(new WidgetResource($widget));
    }

    public function store(StoreWidget $request): JsonResponse
    {
        $widget = new Widget();
        $widget->name = $request->input('name');
        $widget->description = $request->input('description');

        $widget->save();
        $widget->refresh();

        return response()->json('Widget created successfully', 201)
            ->header('Location', "/widget/$widget->id");
    }

    public function update(UpdateWidget $request, Widget $widget): JsonResponse
    {
        // If the request values are null, default to the widget's existing properties
        $widget->name = $request->input('name', $widget->name);
        $widget->description = $request->input('description', $widget->description);

        $widget->save();

        return response()->json(null, 204);
    }

    public function delete(Widget $widget): JsonResponse
    {
        $widget->delete();

        return response()->json(null, 204);
    }
}

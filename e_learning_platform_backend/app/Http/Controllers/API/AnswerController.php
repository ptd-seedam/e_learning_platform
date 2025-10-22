<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AnswerOption\StoreAnswerOptionRequest;
use App\Http\Requests\AnswerOption\UpdateAnswerOptionRequest;
use App\Services\AnswerService;

class AnswerController extends BaseController
{
    public function __construct(AnswerService $service)
    {
        parent::__construct($service);
    }

    public function store(StoreAnswerOptionRequest $request)
    {
        $data = $this->service->create($request);
        return $this->success($data, 'Tạo đáp án thành công');
    }

    public function update(UpdateAnswerOptionRequest $request, $id)
    {
        $data = $this->service->update($id, $request);
        return $this->success($data, 'Cập nhật câu trả lời thành công');
    }

    public function getByQuestionId($id)
    {
        $data = $this->service->getQuestionByQuestionId($id);
        return $this->success($data, 'Lấy câu trả lời theo câu hỏi thành công');
    }
}

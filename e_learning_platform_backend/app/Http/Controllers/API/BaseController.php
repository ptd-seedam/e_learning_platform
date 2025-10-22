<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class BaseController extends Controller
{
    /**
     * @var mixed
     */
    protected $service;

    public function __construct($service = null)
    {
        $this->service = $service;
    }

    /* ==========================
     *   BASE RESPONSE HANDLER
     * ========================== */
    protected function respond(
        bool $success,
        int $status,
        $data = null,
        ?string $message = null,
        array $extra = []
    ): JsonResponse {
        $response = [
            'status' => $status,
            'data' => $data,
            'meta' => array_merge([
                'success' => $success,
                'message' => $message,
            ], $extra)
        ];

        return response()->json($response, $status);
    }

    protected function success($data = null, ?string $message = null, array $meta = [], int $code = 200): JsonResponse
    {
        return $this->respond(true, $code, $data, $message, $meta);
    }

    protected function error(string $message, int $code = 400, array $errors = []): JsonResponse
    {
        return $this->respond(false, $code, null, $message, ['errors' => $errors]);
    }

    /* ===== 🔐 AUTH HELPERS ===== */
    protected function guard()
    {
        return Auth::guard('api');
    }

    protected function user()
    {
        return $this->guard()->user();
    }

    protected function token()
    {
        return JWTAuth::getToken();
    }

    protected function refreshToken()
    {
        return JWTAuth::refresh(JWTAuth::getToken());
    }

    /* ==========================
     * BASE FUNCITON BASIC HANDLER
     * ========================== */

    public function index(): JsonResponse
    {
        $data = $this->service->getAll();
        return $this->success($data, 'Lấy danh sách thành công');
    }


    public function show($id): JsonResponse
    {
        $data = $this->service->find($id);
        return $data
            ? $this->success($data, 'Lấy chi tiết thành công')
            : $this->error('Không tìm thấy bản ghi', 404);
    }

    public function destroy($id): JsonResponse
    {
        try {
            $deleted = $this->service->delete($id);
            return $deleted
                ? $this->success(null, 'Xóa thành công')
                : $this->error('Không tìm thấy bản ghi để xóa', 404);
        } catch (\Exception $e) {
            return $this->error('Xóa thất bại', 400, ['exception' => $e->getMessage()]);
        }
    }
}

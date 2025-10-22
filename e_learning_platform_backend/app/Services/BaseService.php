<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Facades\DB;

abstract class BaseService
{
    /**
     * @var BaseRepositoryInterface
     */
    protected $repository;

    /**
     * BaseService constructor.
     *
     * @param BaseRepositoryInterface $repository
     */
    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Lấy tất cả bản ghi.
     */
    public function getAll(array $columns = ['*'])
    {
        return $this->repository->getAll($columns);
    }

    /**
     * Tìm theo ID.
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->repository->find($id, $columns);
    }

    /**
     * Tìm theo ID, lỗi nếu không thấy.
     */
    public function findOrFail($id, array $columns = ['*'])
    {
        return $this->repository->findOrFail($id, $columns);
    }

    /**
     * Tạo bản ghi mới.
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->repository->create($data);
        });
    }

    /**
     * Cập nhật bản ghi.
     */
    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            return $this->repository->update($id, $data);
        });
    }

    /**
     * Xóa bản ghi.
     */
    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            return $this->repository->delete($id);
        });
    }
}

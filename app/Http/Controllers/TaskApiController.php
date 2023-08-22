<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ResponsesTraits;
use App\Http\Requests\TaskRequest;
use App\Repositories\TasksRepository;
use Symfony\Component\HttpFoundation\Response;

class TaskApiController extends Controller
{
    use ResponsesTraits;

    protected $tasksrepository;

    public function __construct(TasksRepository $tasksrepository)
    {
        $this->tasksrepository = $tasksrepository;
    } 

    public function index()
    {
        try {
            $category =   $this->tasksrepository->show();
            return $this->successResponse($category, 'Data Retrived', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to register user', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(TaskRequest $request)
    {      
        try {
            $category = $this->tasksrepository->store($request->all());
            return $this->successResponse($category, 'Data Added Successfully!', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse('Data is not Added Successfully!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id)
    {
        try {
            $category = $this->tasksrepository->getById($id);

            if ($category) {
                return $this->successResponse($category, 'Data Fetched Successfully!', Response::HTTP_OK);
            } else {
                return $this->errorResponse('Product Not Found!', Response::HTTP_NOT_FOUND);
            }
            } catch (\Exception $e) {
                return $this->errorResponse('Data is not Fetched Successfully!', Response::HTTP_INTERNAL_SERVER_ERROR);
            }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = $this->tasksrepository->update($request->all(), $id);
            return $this->successResponse($category, 'Data Updated Successfully!', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse('Data is not Updated Successfully!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $category = $this->tasksrepository->delete($id);
            return $this->successResponse($category, 'Data Delete Successfully!', Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->errorResponse('Data is not Delete Successfully!', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

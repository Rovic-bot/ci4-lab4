<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StudentModel;

class StudentApi extends ResourceController
{
    protected $modelName = 'App\Models\StudentModel';
    protected $format    = 'json';

    // GET /api/students
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/students/1
    public function show($id = null)
    {
        $student = $this->model->find($id);
        if (!$student) {
            return $this->failNotFound('Student not found');
        }
        return $this->respond($student);
    }

    // POST /api/students
    public function create()
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        return $this->respondCreated(['message' => 'Student created']);
    }

    // PUT /api/students/1
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }
        return $this->respond(['message' => 'Student updated']);
    }

    // DELETE /api/students/1
    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failNotFound('Student not found');
        }
        return $this->respondDeleted(['message' => 'Student deleted']);
    }
}
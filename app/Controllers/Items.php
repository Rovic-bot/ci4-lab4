<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ItemModel;

class Items extends BaseController
{
    public function index()
    {
        $model = new ItemModel();

        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['items'] = $model
                ->like('name', $keyword)
                ->orLike('description', $keyword)
                ->findAll();
        } else {
            $data['items'] = $model->findAll();
        }

        $data['keyword'] = $keyword;

        return view('items/index', $data);
    }

    public function create()
    {
        return view('items/create');
    }

    public function store()
    {
        $model = new ItemModel();

        $model->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/items');
    }

    public function edit($id)
    {
        $model = new ItemModel();
        $data['item'] = $model->find($id);

        return view('items/edit', $data);
    }

    public function update($id)
    {
        $model = new ItemModel();

        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/items');
    }

    public function delete($id)
    {
        $model = new ItemModel();
        $model->delete($id);

        return redirect()->to('/items');
    }
}
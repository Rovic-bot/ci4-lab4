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

        // Kunin ang search keyword mula sa URL (GET request)
        $keyword = $this->request->getGet('keyword');

        // Logic para sa Search: Kung may keyword, i-filter ang records
        if ($keyword) {
            $model->like('name', $keyword)
                  ->orLike('description', $keyword);
        }

        // Dito papasok ang Pagination:
        // Imbes na findAll(), gagamit tayo ng paginate().
        // Ginawa nating 5 records per page para makita mo agad yung epekto.
        $data = [
            'items'   => $model->paginate(5), 
            'pager'   => $model->pager, // Importante ito para sa links sa View
            'keyword' => $keyword,
        ];

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
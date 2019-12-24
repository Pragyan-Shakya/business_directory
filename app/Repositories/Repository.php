<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    // Get Instances of Model
    public function all(){
        return $this->model->all();
    }
    // Create a new record in database
    public function create(array $data){
        return $this->model->create($data);
    }
    // Update record in Database
    public function update(array $data, $id){
        $record = $this->model->findOrFail($id);
        return $record->update($data);
    }
    //Remove record from database
    public function delete($id){
        return $this->model->destroy($id);
    }
    //Show record of specific id
    public function show($id){
        return $this->model->findOrFail($id);
    }
    //Get the associated model
    public function getModel(){
        return $this->model;
    }
    // Set Associated model
    public function setModel(Model $model){
        $this->model = $model;
        return $this;
    }
    //Eager load database relationship
    public function with($relations){
        return $this->model->with($relations);
    }
}


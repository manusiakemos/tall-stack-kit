Tall Stack Kit Docs
===============

File Upload Example
-----------------

SliderComponent.php::
    use WithFileUploads;
    public $image;
.. code-block:: rst
    public function uploadFile()
    {
        if ($this->updateMode){
            #hapus file lama
            $paths = "/uploads/post/{$db->thumbnail}";
            Storage::disk('public')->delete($paths);
        }
        $filename = $this->image->hashName();
        $this->image->storeAs('uploads', $filename, 'public');  
    }

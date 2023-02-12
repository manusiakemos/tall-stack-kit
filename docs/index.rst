Tall Stack Kit Docs
===============

File Upload Example
-----------------

SliderComponent.php code::
    
.. code-block:: rst
    use WithFileUploads;
    public $image;

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

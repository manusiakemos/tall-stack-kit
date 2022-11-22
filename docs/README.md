# Components Docs

## Custom Tabs

```php
public string $active = "center";
```



```blade
  <x-kit::custom-tabs wire:model.defer="active" fill>
        <x-kit::tab title="start" disabled>disabled start</x-kit::tab>
        <x-kit::tab title="center">center</x-kit::tab>
        <x-kit::tab title="end">end</x-kit::tab>
  </x-kit::custom-tabs>
```

##  Tabs

```php
public array $headers = [
    ['key' => 'start', 'disabled' => false, 'title' => 'Start', 'icon' => '<i class="fi-rr-pencil"></i>'],
    ['key' => 'center', 'disabled' => false, 'title' => 'Center', 'icon' => '<i class="fi-rr-pencil"></i>'],
    ['key' => 'disabled', 'disabled'=> true, 'title' => 'Disabled', 'icon'=> '<i class="fi-rr-pencil"></i>'],
    ['key' => 'end', 'disabled'=> false, 'title' => 'End', 'icon'=> '<i class="fi-rr-pencil"></i>'],
];

public string $active = "center";
```

`````````blade

<x-kit::tabs :tab-headers="$headers" wire:model.defer="active">
    <x-slot name="start">
        Start
    </x-slot>
    <x-slot name="center">
        Center
    </x-slot>
    <x-slot name="disabled">
        Disabled
    </x-slot>
    <x-slot name="end">
        End
    </x-slot>
</x-kit::tabs>
    
`````````

## Date Range Picker

```php
public array $range = [
        "2021-01-01",
        "2021-01-10"
 ];
```

```blade
<div id="range-wrapper">
    <x-kit::date-range-picker date-format="DD/MM/YYYY" wire:model.defer="range" id="range"/>
</div>
```

## File Upload 

```php
use WithFileUploads;
public $image;

$filename = $this->image->hashName();
$this->image->storeAs('uploads', $filename, 'public');
```

```blade
<x-kit::file-upload id="image" wire:model.defer="image"/>
```

## Tiptap Editor

```php
public string $content;
```

```blade
<x-kit::editor wire:model.defer="content" id="content"/>
```

## Location Picker

```php
public $latitude = '-6.175110';

public $longitude = '106.865036';

public $locationName = 'Jakarta';

public $radius = '100';

public function setMap()
{
   $data = ['latitude' => $this->latitude, 'longitude' => $this->longitude, 'radius' => $this->radius];
    $this->emit("set_map", $data);
}
   
```

```blade
<x-kit::location-picker id="tall" lat="latitude" lng="longitude" radius="radius"/>
```

## Custom Breadcrumbs

```blade
 <x-kit::custom-breadcrumbs>
        <x-kit::breadcrumb-item label="first" href="/home">
            <x-slot name="icon">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                    </path>
                </svg>
            </x-slot>
        </x-kit::breadcrumb-item>
        <x-kit::breadcrumb-item label="second"/>
        <x-kit::breadcrumb-item label="third" active/>
    </x-kit::custom-breadcrumbs>
    
```


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


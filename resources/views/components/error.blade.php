@props(['errorName'])
<div class="text-danger-500 dark:text-danger-400 font-normal text-sm py-1">
    @error($errorName)
    {{$message}}
    @enderror
</div>

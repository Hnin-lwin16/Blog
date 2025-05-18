@props(['name','type'=>'text','value'=>''])
<x-form.input-wrapper>
              <x-form.label :name="$name"/>
               
              </label>
              <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name,$value) }}" class="form-control" >
              <x-error :name=" $name "/>
            </x-form.input-wrapper>
 @props(['name','value'=>''])
 <x-form.input-wrapper>
              <x-form.label :name="$name"/>
              <textarea cols="30" rows="10"  name="{{ $name }}" id="editor" class="form-control"  >{!! old($name,$value) !!}</textarea>
              
              <x-error :name="$name"/>
              
            </x-form.input-wrapper>
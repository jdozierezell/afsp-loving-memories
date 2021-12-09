@props(['className'=>'','appendClasses'=>''])

<td class="{{$className ? $className : "p-2 text-left $appendClasses" }}">
	{{$slot}}
</td>



@component('mail::message')
# Student List

@component('mail::table')
| Name | Email | Major |
| ------------- |:-------------:| --------:|
@foreach ($students as $student)
| {{$student->name}} | {{$student->email}} | {{$student->major_name}} |
@endforeach
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/students'])
See More Students
@endcomponent

Thanks,<br>
Assginment student list
@endcomponent
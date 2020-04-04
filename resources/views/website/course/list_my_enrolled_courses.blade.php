@forelse ($enrolledCourses as $course)
    {{ $course }}
@empty
   <p>There are no enollments yet!</p>
@endforelse
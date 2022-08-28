@component('mail::message')
# A new category has been created by this name

Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet mollitia ratione quidem sunt reprehenderit velit animi expedita dolore reiciendis commodi ducimus, laborum cumque cupiditate maiores neque laboriosam repudiandae voluptas eum?

@component('mail::button', ['url' => ('') ])
View New Category
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

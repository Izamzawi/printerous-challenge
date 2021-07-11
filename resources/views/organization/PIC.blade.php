<div class="card-deck my-4">
    <div class="card">
        <img src="{{ asset('avatars/' . $person->avatar) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ person->name }}</h5>
            <p class="card-text">{{ person->phone }}</p>
            <p class="card-text">{{ person->email }}</p>
        </div>
    </div>
</div>

dd(app()) - show the application binding details or to see the service container.

---

for binding to service container

app()->bind('Game', function(){
	return 'Football';
});

---

for getting from service container

app()->make('Game');

---

we can use a simple array for storing all the details, but using binding we can store class on the array. And their are many uses for using binding.

---

container is list of all bindings in array.


https://www.youtube.com/watch?v=PGVqkEZiUoc&t=225s

----

SERVICE PROVIDER:

registerConfiguredProviders() on the Application class has data of ptoviders.

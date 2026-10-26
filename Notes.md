# Livewire 4

## View-Based Components

### Multi-file components

can convert single file components into multiple smaller components
- Blade file
- JS
- PHP

```
php artisan livewire:convert {name_of_component}
```

## Page Components
- routing directly to view pages

## Basics
- View based components, similar with Laravel Volt
- Is a larval package
- Can create interactive and dynamic UIs, can auto adjust UI based on user input.
- Like using blade templates but much better
- Used to make highly interactive components (forms, tables, charts etc)
- Livewire components can react to user events like button clicks/ form submits and updates relevant sections of screens.
- Splits logic and view into separate files (php/ blade/ JS). These files combine to create one component
- Dev writes PHP & Blade. LiveWire manages JS.

## What it replaces
- Need for separate JS framework (React/ Vue)
- Does not replace Blade, it’s built on top of it

## Languages used:
- PHP (component class, holds state and logic - property methods)
- Blade (View, plain Laravel templating with ‘wire:’ directives added.
- JavaScript (LiveWie’s own JS runtime handles AJAX requests and DOM changes under hood (rarely involved)
- Alpine.js (ships bundled with LiveWire for small bits of client-side interactivity)


## Alpine.js x LiveWire

### How Alpine.js is involved
- It is a tiny JavaScript framework (15kb) 
- Alpine.js typically described as Tailwind for JavaScript.
- Used alongside LiveWire for things that don’t require server round trips.
- Toggling drop-down, showing/ hiding modals/ tab switcher.
- LiveWire ships with Alpine.js
- Livewire = state that needs PHP/ database. Alpine = pure UI state, only lives in browser.
- Can use Alpine in HTML attributes.

### Use Cases
- Internal Admin tools
- SaaS dashboards
- Form-heavy apps

## Features of LiveWire
- Can use Islands which creates independently rendered sections of Blade Content in UI. This means it can speed up process of certain info being displayed. done by triggering data fetch separately to rest of UI.

## Examples of LiveWire
- Filament: server driven admin panel and app builder for Laravel. Allows to generate CRUD interfaces, dashboards and forms from PHP classes rather than hand writing Blade views and controllers.
- Filament is a Composer Package that depends on LiveWire, Alpine.js, Tailwind, CSS. Its a flagship example of the TALL stack (Tailwind, Alpine, Laravel, Livewire).
- Every Filament page, resource page is LiveWire component.

## Bundling Lazy Requests

There are different methods of lazy loading content. Some of which involve either loading a few bits of data (or posts in this case) and then lazy loading the rest or lazy loading all posts from DB.

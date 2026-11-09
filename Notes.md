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
- Is a laraval package
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

## slots

In Livewire, you can mention specific slot sections of code like the following...

Creating the slot:

```
<!-- using the name attribute to be able to uniquely identify this slot -->
<livewire:slot name="checkbox">

    <flux:checkbox wire:model.live="selected" :value="$post->id" />

</livewire:slot>
```

Then to use/ reference this slot in UI:

```
<!-- using the name attribute directly to fetch the slot -->
{{ $slots['checkbox'] }}
```

## Optimistic UI with wire:show/ wire:cloak/ wire:text

**wire:show**
wire:show hides/shows an element in the browser only — no server trip, no data changes. It just checks a condition (like selected.length > 0) and flips display: none on or off, instantly, the same way Alpine's x-show does.

Compare to wire:model.live, which sends a request to the server every time it changes. wire:show never does that — it's pure UI, free and instant.

**wire:cloak**
wire:cloak hides an element only until the page has finished loading and Alpine/Livewire has booted up. It's there to stop a flash of content showing briefly in the wrong state before everything's ready.

Compare to wire:show, which reacts to your data changing. wire:cloak doesn't care about data at all — it only cares about "has the page finished loading yet?"

To remember: wire:cloak = hide until ready, prevents a flash on page load.

## Islands

An Island in Livewire 4 is an isolated, independently updating region within Livewire component

### Named Islands

A named island is a way of adding a named property to island/s so that  all islands travel together in codebase (given the names are the same). A use case of this can be creating multiple named islands and then referencing that name in a button that refreshes the said islands collectively.

### Lazy islands

using lazy islands means component loads first then island content is loaded secondly. This is done by adding Lazy prop to islands (lazy: true)

additionally, adding the @placeholder tag within an island means we have loading UI styles for consistent indication of UI responsiveness to user.

![using @placeholder for island loading indicator](<Screenshot 2026-11-06 at 16.39.31.png>)

We can optionally use (defer: true) to delay the content from loading until the content is within the viewport.

### Nested Islands

wire:poll triggers refresh of entire component unless used inside nested island then will only frequently update that nested island. We can additionally use wire:poll.5s to only update the data every 5s or whenever required.

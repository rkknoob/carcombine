<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('หน้าหลัก', route('dashboard'));
});

// Home > Profile
Breadcrumbs::for('profile.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('โปรไฟล์', route('profile.index'));
});
Breadcrumbs::register('profile.edit', function ($trail) {
    $trail->parent('profile.index');
    $trail->push('แก้ไขโปรไฟล์', route('profile.edit'));
});

// Home > Brand
Breadcrumbs::for('brand.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('ยี่ห้อรถ', route('brand.index'));
});

// Home > Car
Breadcrumbs::for('car.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('ข้อมูลรถ', route('car.index'));
});
Breadcrumbs::for('car.show', function ($trail, $id) {
    $trail->parent('car.index');
    $trail->push('รายละเอียดรถ', route('car.show', $id));
});

// Home > Wishlist
Breadcrumbs::for('wishlist.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('ข้อมูลรถที่สนใจ', route('wishlist.index'));
});

// Home > Interested
Breadcrumbs::for('interested.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('รายการที่สนใจ', route('interested.index'));
});

// Home > Contact
Breadcrumbs::for('contact.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('รายการที่ติดต่อ', route('contact.index'));
});
Breadcrumbs::register('contact.show', function ($trail, $id) {
    $trail->parent('contact.index');
    $trail->push('รายละเอียดที่ติดต่อ', route('contact.show', $id));
});

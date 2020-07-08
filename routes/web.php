<?php

    // Homepage
    Route::get('/search', function () { return view('search'); })->name('HomePage');
    Route::get('/mail', function () { return view('mail'); })->name('mail');
    Route::get('/paypal', function () { return view('hotels.paypal');});
    Route::post('/user/verify', ['uses' => 'ProposalController@verify', 'as' => 'user-verify', ]);
    Route::post('/user/verify/resend', ['uses' => 'ProposalController@verifyResend', 'middleware' => 'auth', 'as' => 'user-verify-resend']);
    Route::get('hotel/location=Ninh+Bình', 'PartnerController@countynb')->middleware('auth.user');
    Route::get('hotel/location=Ninh+Xuân', 'PartnerController@countynx')->middleware('auth.user');
    Route::get('hotel/location=Ninh+Hải', 'PartnerController@countynh')->middleware('auth.user');
    Route::get('hotel/location=Trường+Yên', 'PartnerController@countyty')->middleware('auth.user');
    Route::get('hotel/location=Gia+Sinh', 'PartnerController@countygs')->middleware('auth.user');
    Route::get('hotel/location=Nho+Quan', 'PartnerController@countynq')->middleware('auth.user');
    Route::get('hotel/location=Gia+Viễn', 'PartnerController@countygv')->middleware('auth.user');

    // Advanced Search
    Route::get('/search', function () { return view('search'); })->name('AdvancedSearch');

    // Admin - Proposals -  Show , Accept, and decline Partner Proposals.
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('proposal/{proposal}/accept', 'HomeController@update');
        Route::get('partner/requests', 'ProposalController@show');
        Route::get('proposal/{proposal}/decline', 'ProposalController@destroy');

        //Admin - List all the partners on the website and remove them.
        Route::get('partner/list', 'PartnerController@index');
        Route::get('proposal/{partner}/remove', 'PartnerController@remove')->name('admin.remove.partner');
        Route::get('proposal/{partner}/unremove','PartnerController@unremove')->name('admin.unremove.partner');
        Route::get('facilityadd', 'HotelsController@indexfacility');
        Route::get('addUser', 'HomeController@created')->name('admin.created');
        Route::get('listUser', 'HomeController@listUser')->name('admin.list');
        Route::post('create/user', 'HomeController@createUser')->name('admin.create.user');
        Route::get('edit/{id}', 'HomeController@indexUser')->name('admin.user.edit');
        Route::post('editUser/{id}', 'HomeController@editUser')->name('admin.edit');
        Route::get('delete/{id}', 'HomeController@deleteUser')->name('admin.user.delete');
    });
    //Manage edit User
    Route::post('partner/editUser/{id}','HomeController@editManage')->name('partner.edit');
    Route::post('/{admin}/facilityadd', 'HotelsController@storefacility');

    //Admin Add List User Created and Delete
    Route::get('destroy/{Facility}', 'HotelsController@destroyfac');

    // Users - Make Partner Proposal and View Proposal status
    Route::get('partner/apply', 'ProposalController@index')->middleware('auth.user');
    Route::get('partner/{user}/status', 'ProposalController@status')->middleware('auth.user');
    Route::post('/proposal/{user}/new', 'ProposalController@store')->middleware('auth.user');
    Route::get('/profile', 'HomeController@profile')->name('profile');

    //Partner - View a Hotels Reservations and Add a New Hotel.
    Route::get('partners/{partner}/newhotel', 'PartnerController@addHotel')->middleware('auth.partner');
    Route::get('/viewreservations/{hotel}', 'PartnerController@HotelReservations')->middleware('auth.partner');
    Route::post('hotels/{partner}/add', 'HotelsController@store')->middleware('auth.partner');

    // Search for Hotels and Select a Hotel.
    Route::post('/search', 'HotelsController@index')->middleware('auth.user');
    Route::get('/guestsearch', 'HotelsController@guestview')->middleware('auth.user');
    Route::get('hotels/{hotel}', 'HotelsController@show')->middleware('auth.user');

    //Partner- Show All the Hotels by the Partner and upon selecting one load the hotels dashboard.
    Route::get('partners/{partner}/yourhotels', 'HotelsController@ShowHotelsByPartner')->middleware('auth.partner');
    Route::get('/yourhotels/{hotel}/dashboard', 'HotelsController@ShowDash')->middleware('auth.partner');

    //Partner- Edit a Specific Hotels details /  delete the hotel.
    Route::get('yourhotels/edit/{hotel}', 'HotelsController@edit')->middleware('auth.partner');
    Route::patch('yourhotels/edit/{hotel}', 'HotelsController@update')->middleware('auth.partner');
    Route::get('/yourhotels/destroy/{hotel}', 'HotelsController@destroy')->middleware('auth.partner');

    //Partner- Upload and Delete Photos for Hotels.
    Route::get('{hotel}/photos', 'HotelPhotosController@uploadPhoto')->middleware('auth.partner');
    Route::post('{hotel}/photos', 'HotelPhotosController@addphoto')->middleware('auth.partner');
    Route::get('{hotel}/{hotelphoto}/destroy', 'HotelPhotosController@destroy')->middleware('auth.partner');

    //Partner- Upload and Delete Photos for Rooms.
    Route::get('room/{room}/photos', 'RoomPhotosController@uploadPhoto')->middleware('auth.partner');
    Route::post('room/{room}/photos', 'RoomPhotosController@addphoto')->middleware('auth.partner');
    Route::get('room/{room}/{roomphoto}/destroy', 'RoomPhotosController@destroy')->middleware('auth.partner');

    //Partner add Room List Room
    Route::get('listroom/{id}','RoomsController@listRoom')->name('list.room')->middleware('auth.partner');
    Route::get('addroom/{id}','RoomsController@addgetroom')->name('add.room')->middleware('auth.partner');
    Route::post('addroom/{id}','RoomsController@postroom')->name('update.room')->middleware('auth.partner');

    //Partner - View Charts regarding the performance of the hotels.
    Route::get('/partners/{partner}/graphs', 'ChartsController@index')->middleware('auth.partner');
    Route::post('partner/chart/{partner}', 'ChartsController@getRevenueOfMonth')->name('partner.chart')->middleware('auth.partner');

    //Partner- Add a Room , Edit a Room Or Delete a room associated with a hotel.
    Route::post('yourhotels/{hotel}/rooms', 'RoomsController@store')->middleware('auth.partner');
    Route::get('/rooms/{room}/edit', 'RoomsController@edit')->middleware('auth.partner');
    Route::patch('/rooms/{room}/edit', 'RoomsController@update')->middleware('auth.partner');
    Route::get('/rooms/{room}/discard', 'RoomsController@destroy')->middleware('auth.partner');

    //User- Post , Edit or Delete Reviews.
    Route::post('/user/edit', 'HomeController@userEdit')->name('user.edit')->middleware('auth.user');
    Route::post('hotels/{hotel}/reviews', 'ReviewsController@store')->middleware('auth.user');
    Route::get('/reviews/{review}/edit', 'ReviewsController@edit')->middleware('auth.user');
    Route::patch('reviews/{review}', 'ReviewsController@update')->middleware('auth.user');
    Route::get('/reviews/{review}/destroyreview', 'ReviewsController@destroy')->middleware('auth.user');

    //User- Book, Confirm , View and Cancel Bookings.
    Route::get('/book/{hotel}/{room}', 'ReservationController@index')->middleware('auth.user');
    Route::post('/bookings/new/{room}/{first}/{sec}/{protectedCost}', 'ReservationController@store')->middleware('auth.user');
    Route::get('/user/reservations', 'ReservationController@show')->middleware('auth.user');
    Route::get('reservations/{reservation}/cancel', 'ReservationController@destroy')->middleware('auth.user');

    //User- Create the Users reservation into a printable pdf file.
    Route::get('/reservations/{reservation}/pdf', 'ReservationController@pdfview')->middleware('auth.user');

    //Added For Authentication
    Auth::routes();
    Route::get('/home', 'HomeController@index');
    Route::get('/', 'HotelsController@showallhotel');


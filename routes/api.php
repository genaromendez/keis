<?php

use App\Models\Number;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// APIS TO USERS
Route::get('/users', function () {
    return User::all();
});

Route::post('/users', function (Request $request) {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'state' => $request->state,
        'municipality' => $request->municipality,
        'phone' => $request->phone,
        'profilePicture' => $request->profilePicture,
        'age' => $request->profilePicture,
        'sex' => $request->profilePicture,

    ]);

    return response()->json($user, 201);
});

Route::put('/users/{user}', function (User $user, Request $request) {
   
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'state' => $request->state,
        'municipality' => $request->municipality,
        'phone' => $request->phone,
        'profilePicture' => $request->profilePicture,
    ]);

    return response()->json($user, 200);
});

Route::delete('/users/{user}', function (User $user) {
   
    $success = $user->delete();

    return [
        'success' => $success,
    ];
});

Route::get('/users/{user}', function (User $user) {
    return $user;
});

Route::get('/numbers/{number}', function (Number $number, Request $request) {
    return Number::where('id', $number->id)->get();
});

Route::post('/numbers', function (Request $request) {
    $number = Number::create([
        'name' => $request->name,
        'number' => $request->number,
        'user_id' => $request->user_id,
    ]);
    return response()->json($number, 201);
});

Route::get('/templates', function () {
    $postModel = new Post();
    $posts = Post::all();
    $template = [];
    foreach($posts as $post){
        $VerticalArrangements = [       
            'id' => 'VerticalArrangement' . $postModel->cadenaAleatoria($post->id),
            'type' => 'VerticalArrangement',
            'properties' => [
                'AlignHorizontal' => 3,
                'BackgroundColor' => -8689426,
                'Width' => -2
            ],
            'components' => [
                [
                    'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                    'type' => 'Label',
                    'properties' => [
                        'FontSize' => 2
                    ]
                ],
                [
                    'id' => 'HorizontalArrangement' .  $postModel->cadenaAleatoria($post->id),
                    'type' => 'HorizontalArrangement',
                    'properties' => [
                        'BackgroundColor' => -1,
                        'Width' => -1098
                    ],
                    'components' => [
                        [
                            'id' => 'Image' . $post->id,
                            'type' => 'Image',
                            'properties' => [
                                'Height' => -2,
                                'Width' => -1020,
                                'Picture' => 'download.png'
                            ]
                        ],
                        [
                            'id' => 'VerticalArrangement'.  $postModel->cadenaAleatoria($post->id),
                            'type' => 'VerticalArrangement',
                            'properties' => [
                                'AlignHorizontal' => 2,
                                'Width' => -2
                            ],
                            'components' => [
                                [
                                    'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                                    'type' => 'Label',
                                    'properties' => [
                                        'FontBold' => true,
                                        'FontSize' => 20,
                                        'Width' => -2,
                                        'Text' => $post->text
                                    ]
                                ],
                                [
                                    'id' => 'HorizontalArrangement' .  $postModel->cadenaAleatoria($post->id),
                                    'type' => 'HorizontalArrangement',
                                    'properties' => [
                                        'AlignHorizontal' => 3,
                                        'AlignVertical' => 2
                                    ],
                                    'components' => [
                                        [
                                            'id' => 'ButtonUnlike' . $post->id,
                                            'type' => 'Button',
                                            'properties' => [
                                                'FontSize' => 16,
                                                'Height' => -2,
                                                'Width' => -2,
                                                'Image' => 'fake.png'
                                            ]
                                        ],
                                        [
                                            'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                                            'type' => 'Label',
                                            'properties' => [
                                                'FontSize' => 16,
                                                'Text' => '3',
                                                'TextAlignment' => 1
                                            ]
                                        ],
                                        [
                                            'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                                            'type' => 'Label',
                                            'properties' => [
                                                'Text' => '   '
                                            ]
                                        ],
                                        [
                                            'id' => 'ButtonLike' . $post->id . $post->id,
                                            'type' => 'Button',
                                            'properties' => [
                                                'Height' => -2,
                                                'Width' => -2,
                                                'Image' => 'true.png'
                                            ]
                                        ],
                                        [
                                            'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                                            'type' => 'Label',
                                            'properties' => [
                                                'FontSize' => 16,
                                                'Text' => '4',
                                                'TextAlignment' => 1
                                            ]
                                        ],
                                        [
                                            'id' => 'Label' .  $postModel->cadenaAleatoria($post->id),
                                            'type' => 'Label',
                                            'properties' => [
                                                'Text' => '  '
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    'id' => 'Label' . $postModel->cadenaAleatoria($post->id),
                                    'type' => 'Label',
                                    'properties' => [
                                        'FontSize' => 2
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    'id' => 'Label' . $postModel->cadenaAleatoria($post->id),
                    'type' => 'Label',
                    'properties' => [
                        'FontSize' => 2
                    ]
                ]
            ]
        ];
        
        array_push($template, $VerticalArrangements);
    }


    $screen = [
        'name' => 'blogs',
        'metadata-version' => 1,
        'extension_version' => 5,
        'author' => 'Genaro',
        'platforms' => [
            'ai2.appinventor.mit.edu'
        ],
        'extensions' => [],
        'keys' => [],
        'components' => $template
    ];

    return response()->json($screen, 200);
});



Route::post('/posts', function (Request $request) {
    $post = Post::create([
        'text' => $request->text,
        'likes' => $request->likes,
        'dislikes' => $request->dislikes,
        'user_id' => $request->user_id,
    ]);
    
    if($request->postImage) {
        $path = $request->postImage->store('public/postImages');
        $post->postImage = $path;
        $post->save();
    }

    return response()->json($post, 201);
});


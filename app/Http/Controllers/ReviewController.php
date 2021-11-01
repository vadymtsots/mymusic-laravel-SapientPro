<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function getAllReviews()
    {
        return view('main',
        [
            'reviews' => Review::with("user", "artist", "album")->get(),

        ]);
    }

    public function addReviewForm()
    {
        return view('new');
    }

    public function storeData(Request $request)
    {
       /* $review = new Review;

        $review->user_id = $request->input('user_id');
        $review->artist_id = $request->input('artist_id');
        $review->album_id = $request->input('album_id');
        $review->review_body = $request->input('review_body');
        $review->rating = $request->input('rating');
        $review->save(); */

       $validatedData = $request->validate(
       [
           'user_id' => 'required|exists:App\Models\User,id',
           'artist_id' => 'required|exists:App\Models\Artist,id',
           'album_id' => 'required|exists:App\Models\Album,id',
           'review_body' => 'required|max:1000',
           'rating' => 'required|numeric|between:1,10'
       ]);

       Review::create($request->all());

        return redirect()->route('addReview');

    }

    public function updateReview(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:App\Models\User,id',
           'artist_id' => 'required|exists:App\Models\Artist,id',
           'album_id' => 'required|exists:App\Models\Album,id',
           'review_body' => 'required|max:1000',
           'rating' => 'required|numeric|between:1,10'
        ]);


        Review::where('id', $id)
            ->update($request->except('_token'));

        return redirect()->route('singleReview', $id);
    }


    public function getUserReviews(User $user)
    {
        $user = Auth::user();
        return view('main',
            [
                'reviews' => $user->reviews
            ]);
    }

    public function getSingleReview(Review $review)
    {
        return view('review',
            [
                'review' => $review

            ]);
    }

    public function editForm(Review $review)
    {
        return view('edit',
        [
            'review' => $review
        ]);
    }
}

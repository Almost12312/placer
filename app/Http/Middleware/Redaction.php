<?php

namespace App\Http\Middleware;

use App\Models\Advertisement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Redaction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        $authorId = Advertisement::find($id)->author_id;

        if (!Auth::check())
        {

            if (Auth::id() != $authorId){
                return abort(403, 'Unauthorized action');
            };

            return redirect('authorization');
        }
        return $next($request);
    }
}

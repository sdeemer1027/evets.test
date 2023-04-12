

<h5>{{$user->name}}</h5>
<div>
    @if($user->profilepic)
        <img src="{{ asset("storage/$user->id/$user->profilepic") }}" class="img-thumbnail rounded-circle" alt="Steve" width="100"><br/>
    @else
        <img src="/evets-logo.png" class="img-thumbnail rounded-circle" alt="default" width="100">
    @endif
</div>
<p>
</p><table class="table table-hover" padding="0">
    <tbody>
    @if($user->phone)
        <tr>
            <td style="padding:0;"> <i class="fas fa-phone fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">{{$user->phone}}</td>
        </tr>
    @endif
    @if($user->email)
        <tr>
            <td style="padding:0;"> <i class="fas fa-envelope fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">{{$user->email}}</td>
        </tr>
    @endif
    @if($user->address)
        <tr>
            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">{{$user->address}}</td>
        </tr>
    @endif
    @if($user->city)
        <tr>
            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">{{$user->city}}</td>
        </tr>
    @endif
    @if($user->state)
        <tr>
            <td style="padding:0;"> <i class="fas fa-home fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">{{$user->state}}</td>
        </tr>
    @endif
    @if($user->facebook)
        <tr>{{-- onclick="https://www.facebook.com/Stevendeemer2017">--}}
            <td style="padding:0;"> <i class="fab fa-facebook-f fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">Facebook</td>
        </tr>
    @endif

    @if($user->instagram)
        <tr>
            <td style="padding:0;"> <i class="fab fa-instagram fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">InstaGram<!--<i class="fab fa-instagram"></i>--></td>
        </tr>
    @endif
    @if($user->linkedin)
        <tr>
            <td style="padding:0;"> <i class="fab fa-linkedin-in fa-xs" aria-hidden="true"></i></td>
            <td style="padding:0;">LinkedIn<!-- <i class="fab fa-linkedin"></i>--></td>
        </tr>
    @endif

    @if($user->youtube)
        <tr>
            <td style="padding:0;"> <i class="fab fa-youtube" aria-hidden="true"></i></td>
            <td style="padding:0;">YouTube<!--  <i class="fab fa-linkedin"></i>--></td>
        </tr>
    @endif

    </tbody>
</table>

<p></p>


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sample_contribution = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum urna enim, iaculis at tempus ac, aliquam at turpis. Aenean sagittis metus sed sem blandit, at feugiat augue pellentesque. Suspendisse vel lacus lectus. Vestibulum sed massa eu leo convallis sagittis. Quisque non faucibus turpis. Etiam accumsan neque ut est vestibulum, quis efficitur eros semper. Nulla maximus mi orci, eu aliquam mauris pharetra sit amet. Nulla imperdiet fermentum aliquet. Aliquam volutpat iaculis condimentum. Phasellus rutrum enim in turpis viverra, a pretium augue aliquet. Ut sit amet euismod nunc, quis fringilla nisi. Aliquam venenatis maximus sapien, non commodo libero commodo nec. Nam accumsan pulvinar eros a mattis.',
            'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla tristique porttitor ligula. Nullam ultrices tortor non felis maximus semper. Nulla facilisi. Mauris ligula leo, euismod et malesuada sed, tristique et ante. Phasellus efficitur finibus suscipit. Ut varius posuere lorem, quis imperdiet diam consequat non.',
            'Maecenas posuere erat nec lorem dignissim, sed fringilla turpis pretium. Integer cursus diam ante, sit amet suscipit justo tincidunt vitae. Curabitur finibus dui sodales, hendrerit leo vitae, posuere lorem. Vivamus condimentum condimentum vestibulum. Pellentesque ornare vulputate scelerisque. Aenean vitae vestibulum massa. Maecenas viverra lacinia finibus. Mauris in dui nulla. Curabitur massa erat, sollicitudin non sapien ut, finibus aliquam augue. In hac habitasse platea dictumst.',
            'Nunc sit amet dolor molestie, laoreet erat sed, fermentum purus. Nullam dictum porttitor lectus. Vestibulum ac leo eu erat convallis tristique. Integer mattis lectus velit, id gravida mauris posuere id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla venenatis aliquam dui vitae volutpat. Fusce est ipsum, commodo in ligula vehicula, pellentesque laoreet urna. Vivamus eleifend sollicitudin dictum. Phasellus vitae urna sed urna venenatis interdum. Cras enim tortor, hendrerit eu posuere eget, mollis in tellus. Praesent id ultricies ligula. Suspendisse ornare tortor non tortor hendrerit posuere. Maecenas vel velit scelerisque augue rutrum eleifend. Nam dapibus odio et tellus mollis hendrerit.',
            'Suspendisse nec consequat magna. Fusce ornare, felis non auctor finibus, mi quam rhoncus massa, at commodo ligula enim vel nisl. Integer sit amet lacus leo. Nulla non tellus et turpis condimentum auctor. Aenean massa ante, euismod id mi et, accumsan consequat purus. Sed sagittis dolor enim, ac tristique orci venenatis eget. Aliquam faucibus lacus ac mi mollis tempor. Etiam porta elit augue, et maximus eros fermentum sed. Sed consequat ac nibh eu molestie. Duis pellentesque eros ut est sagittis, eget pretium ex sollicitudin. Maecenas mollis, massa luctus tristique molestie, dui nunc vehicula augue, ac finibus odio dui vel sapien. Integer nec dui turpis. Proin sollicitudin at mi sed fringilla. Maecenas aliquam ut nisi non dapibus.',
            'Pellentesque iaculis mauris lacus. Duis dapibus nec lacus et condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis nulla libero, consectetur tristique elementum sed, vestibulum eu neque. Integer vitae vehicula sem. Morbi quam velit, sodales vel quam id, interdum posuere magna. Sed feugiat tincidunt neque, nec viverra urna faucibus quis. Cras vitae facilisis magna, vel fringilla lacus.',
            'Nullam feugiat gravida nibh sollicitudin euismod. Curabitur sed mauris a diam maximus lobortis vitae non neque. Integer mollis luctus sapien, vel tincidunt magna fermentum nec. Duis cursus odio arcu, ac pellentesque libero vestibulum in. In tincidunt at risus ac condimentum. Suspendisse erat libero, venenatis efficitur orci in, molestie tristique enim. Suspendisse fermentum velit nec porta dapibus. Duis posuere tempor nunc, ac porttitor erat vulputate sit amet. Nunc faucibus, ante nec congue ullamcorper, risus augue dignissim turpis, a luctus sapien arcu ut lorem. Sed in lectus id est sodales congue. In quis facilisis arcu, nec fermentum ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
            'Nulla fringilla enim ut tortor cursus, vel iaculis ante pharetra. Vestibulum diam magna, sodales eget quam quis, venenatis pretium enim. Suspendisse laoreet sem non urna auctor facilisis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam bibendum leo ipsum, a facilisis est hendrerit nec. Aenean volutpat eros a quam ullamcorper tristique. Nullam malesuada, nulla nec maximus rutrum, est ante finibus ante, quis porta sapien justo in mi. Nullam vel elementum enim. Cras laoreet ullamcorper semper.',
            'Aliquam sed diam ac tortor commodo iaculis nec a enim. Etiam vel enim a massa tincidunt aliquet non et lorem. Aenean ornare facilisis interdum. Quisque at velit ut nulla consequat blandit. Morbi dignissim nisi rutrum hendrerit porta. Vestibulum malesuada varius ligula, ut mattis purus luctus ac. Nam non lacinia ligula, eleifend feugiat nisl. Praesent ut sollicitudin augue, sit amet interdum mauris. Nullam at risus vitae mi convallis dapibus ac ut velit.',
            'Pellentesque lacinia elit et magna scelerisque, eget aliquet felis cursus. Nulla vitae quam vel orci fringilla fermentum. Aliquam mollis consectetur enim, sit amet rutrum enim condimentum vel. Phasellus quis tellus quis velit fermentum tempor commodo nec quam. Nunc malesuada commodo hendrerit. Sed eget dictum ante, sit amet viverra mi. Nulla vel libero blandit, rutrum lacus vitae, egestas leo. Nulla fermentum, leo sed rhoncus ornare, risus turpis aliquet dui, in tempor quam lectus eget ex. Integer vitae suscipit nisi, quis vestibulum enim.',
            'Fusce quis urna metus. Curabitur ornare, lacus a aliquam posuere, purus nulla hendrerit leo, sed tincidunt ex massa sed ex. Vivamus in purus gravida, porttitor dui vel, rhoncus felis. Sed rutrum neque vitae leo suscipit ullamcorper. Sed euismod sit amet nulla vitae rutrum. Ut euismod massa non eros feugiat pharetra. In purus felis, tristique ac odio eget, finibus dictum tellus. Phasellus ac porta erat, quis laoreet nulla.'
        ];

        $array = [];
        for ($i = 1; $i < 20; $i++) {
            $array[] = [
                'body' => $i . '_' . $sample_contribution[random_int(1, 10)],
            ];
        }

        DB::table('posts')->insert($array);
    }
}

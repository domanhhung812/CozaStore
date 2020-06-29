
@foreach($lstPd as $key => $item)
				
                <tr id="row_{{ $item['id'] }}">
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name_product'] }}</td>
                    <td>
                        <img src="{{ URL::to('/') }}/upload/images/{{ $item['image_product'][0] }}" alt="{{ $item['name_product'] }}" width="120" height="149">
                    </td>
                    <td>
                        @foreach($item['categories_id']['name_cat'] as $name)
                            <p> - {{ $name }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach($item['colors_id']['name_color'] as $name)
                            <p> + {{ $name }}</p>
                        @endforeach
                    </td>
                    <td>
                    @foreach($arrS as $values)
							<?php 
								$idP = $item['id'];
								$sizes = [];
								foreach($values as $k => $v){
									$sizes[$v->id] = array();
									array_push($sizes[$v->id],$v);
								}
								$idCate = $item['categories_id'][0];
							?>
							@foreach($sizes as $i => $e)
								@if($idP === $e[0]->pd_product_id)
									@if($idCate == 5)
										<p>{{$e[0]->number_size}} - ({{$e[0]->pd_qty}})</p>
									@else
										<p>{{$e[0]->letter_size}} - ({{$e[0]->pd_qty}})</p>
									@endif
								@endif
							@endforeach
						@endforeach
                    </td>
                    <td>{{ $item['brand_name'] }}</td>
                    <td>{{ number_format($item['price']) }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>
                    <?php
                        $id = $item['id'];
                        $star = $avg_rating;
                        $sum  = 0;
                        $avg = 0;
                        foreach($star as $k => $v){
                            if($id == $k){
                                foreach($v[0] as $i => $e){
                                    $sum+=$e->co_rating;
                                }	
                                $count = count($v[0]);
                                if($count === 0 || $v[0] === []){
                                    $avg = 0;
                                }else{
                                    $avg = ceil($sum/$count);
                                }	
                            }
                            
                        }
                    ?>
                            <span class="fs-18 cl11">
                                @for($i = 0; $i < $avg ; $i++)
                                <i class="fas fa-star" style="color:orange"></i>
                                @endfor
                            </span>
                            <span class="fs-18 cl11">
                                @for($i = 5; $i > $avg ; $i--)
                                <i class="fas fa-star"></i>
                                @endfor
                            </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.editProduct',['id'=> $item['id']]) }}" class="btn btn-info">Edit</a>
                    </td>
                    <td>
                        <button class="btn btn-danger btnDelete" id="{{ $item['id'] }}">Delete</button>
                    </td>
                </tr>
            @endforeach
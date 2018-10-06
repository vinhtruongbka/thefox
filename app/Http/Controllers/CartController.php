<?php 
   namespace App\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use App\Models\Admin;
	use Auth;
	use Cart;
	use App\Models\User;
	use App\Models\Product;
	use App\Models\Order;
	use App\Models\Orders_detail;

	/**
	* 
	*/
	class CartController extends Controller
	{
		
		public function muahang($id, Request $req)
		{	
			/*$data = $req->all();
			dd($data);*/
			$kichthuoc = $req->kichthuoc ? $req->kichthuoc : 1;
			$soluong = $req->soluong ? $req->soluong : 1;
			/*echo $kichthuoc;die;*/
			
			$produc_by = DB::table('product')->where('id',$id)->first();
			/*dd($produc_by);*/
			Cart::add(array('id'=>$id,'name'=>$produc_by->name,'qty'=>$soluong,'price'=>$produc_by->price,'options' => ['img' => $produc_by->image_link,'kichthuoc'=>$kichthuoc,'sale_price'=>$produc_by->sale_price,'color'=>$produc_by->color]));
			$content = Cart::content();
			$total = Cart::subtotal();
			$count = Cart::count();

			$arrayName = array('content' => $content,'total'=>$total ,'count'=>$count);
			/*$data = json_encode($arrayName);*/
			/* $data = array('content' => $content);*/
		/*	dd($content);*/
			return $arrayName;
			/*return redirect()->route('cart.giohang');*/
		}

		public function giohang()
		{
			$content = Cart::content();
			$total = Cart::subtotal();
			$count = Cart::count();
			/*dd($content);*/
			return view('layout/cart',compact('content','total','count'));
		}

		public function xoa($rowId)
		{
			Cart::remove($rowId);
			return redirect()->route('cart.giohang');
		}


		public function dathang()
		{ 
			$content = Cart::content();
			$total = Cart::subtotal();
			/*dd($content);*/
			return view('layout/order',compact('content','total'));
		}

		public function postdathang(request $req)
		{
			if (!Auth::guard('acount')->check()) {
				$this->validate($req,[
				'name' => 'required',
				'email' => 'required|email|unique:user,email',
				'phone' => 'required|min:10|max:11',
				'address' => 'required',
				'password' => 'required|min:6|max:20',
				're_password' => 'required|same:password',
				
			],
				[
					'name.required' => 'Vui lòng nhập tên của bạn',
					'email.required' => 'Vui lòng nhập email của bạn',
					'email.email' => 'Email của bạn không đúng định dạng',
					'email.unique' => 'Email của bạn đã được đăng ký',
					'phone.required' => 'Vui lòng nhập điện thoại của bạn',
					'phone.min' => 'Số điện thoại bạn nhập không đúng',
					'phone.max' => 'Số điện thoại bạn nhập không đúng',
					'address.required' => 'Vui lòng nhập địa chỉ của bạn',
					'password.required' => 'Vui lòng nhập mật khẩu của bạn',
					'password.min' => 'Mật khẩu của bạn phải lớn hơn 6 ký tự',
					'password.max' => 'Mật khẩu của bạn phải nhỏ hơn 20 ký tự',
					're_password.required' => 'Vui lòng nhập mật khẩu của bạn',
					're_password.same' => 'Mật khẩu bạn nhập không giống nhau',
				
			]);
				
				User::create([
				'name'=> $req->name,
				'email'=> $req->email,
				'phone'=> $req->phone,
				'address'=> $req->address,
				'password'=> bcrypt($req->password),
				
			]);
				$credentials = array('email' => $req->email,'password' => $req->password);
				Auth::guard('acount')->attempt($credentials);

			}

			$Order = Order::create([
				'user_id'=> Auth::guard('acount')->user()->id,
				
			]);
			$content = Cart::content();
			$total = Cart::subtotal();

			foreach ($content as $contents) {
				Orders_detail::create([
				'orders_id' => $Order->id,
				'product_id'=> $contents->id,
				'quantity' => $contents->qty,
				'amount'  => $contents->price,
				'size'  => $contents->options->kichthuoc,

			  ]);
			}
			Cart::destroy();

			/*dd($Order->id);*/
			
			return redirect()->route('cart.thanhcong');
		}

		public function thanhcong()
		{	
			$id =Auth::guard('acount')->user()->id;
			$Donhang = DB::table('product')->join('orders_detail','orders_detail.product_id', '=','product.id')->join('orders','orders_detail.orders_id', '=', 'orders.id')
			 ->select('product.name as name',
					'product.image_link as images_link',
					'product.price as price',
					'orders_detail.quantity as quantity',
					'orders_detail.amount as amount',
					'orders.id as orderid',
				    'orders_detail.size as size',
				    'product.color as color'
				    )
			 ->where('orders.user_id',$id)
			 ->get();
			return view('layout/ordersuccess',compact('Donhang'));
		}
	}

 ?>
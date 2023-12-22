<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\Cast\String_;

use function PHPSTORM_META\type;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('is_active', true)
        ->where('user_id', Auth::user()->id)
        ->first();
if ($cart==null) {
    $cart=Cart::create([
        'user_id' => Auth::user()->id,
      ]);
}


        return view('template.vivo.design.orders', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    public function addToCart(Product $product,$quantity ){

        if ($quantity > $product->quantity) {
            return redirect()->route('company.show', ['company' => $product->company_id])->with('failure', "Oops! It looks like the quantity you entered is more than what's available in our hand. Please choose a quantity less than or equal to we have . Thank you!'");
        }

        $cart = Cart::where('is_active', true)
        ->where('user_id', Auth::user()->id)
        ->first();
if ($cart==null) {
    $cart=Cart::create([
        'user_id' => Auth::user()->id,
      ]);
}

//  // Replace $productId with the actual ID of the product




$existingProduct = $cart->products()->find($product->id);

if ($existingProduct) {
    // Product is already in the cart, update the quantity
    $oldQuantity = $existingProduct->pivot->quantity;
   $newQuantity= $quantity + $oldQuantity;
    $cart->products()->updateExistingPivot($product->id, ['quantity' => $newQuantity]);
    $product->quantity= $product->quantity - $quantity;
    $product->save();
} else {
    // Product is not in the cart, add a new entry
    $cart->products()->attach($product, ['quantity' => $quantity]);
    $product->quantity= $product->quantity - $quantity;
    $product->save();
}


// // Attach the product to the cart with a quantity (optional)

 return redirect()->route('company.show', ['company' => $product->company_id])->with('success', 'Product added to cart  successfully!');


    }
    public function removeProductFromCart(Product $product,$quantity){

        $cart = Cart::where('is_active', true)
        ->where('user_id', Auth::user()->id)
        ->first();
        $product->quantity= $product->quantity + $quantity;
        $product->save();
        $cart->products()->detach($product);

return redirect()->route('cart.index')->with('success','Product removed  from cart  successfully!');
    }
    /**
     * Display the specified resource.
     */





// Your controller class...

public function checkout($products)
{

    $cart = Cart::where('is_active', true)
    ->where('user_id', Auth::user()->id)
    ->first();
    $selectedProductIds = is_array($products) ? $products : explode(',', $products);

    // Retrieve the products from the database based on the selected IDs
    $selectedProducts = Product::whereIn('id', $selectedProductIds)->get();
    $existingProducts = $cart->products()->whereIn('product_id' ,$selectedProductIds)->get();
    $totalAmount = 0;
    $productDetails = [];

    // Calculate total amount and collect product details
    foreach ($existingProducts as $product) {
        $quantity = $product->pivot->quantity;
        $amount = $product->price * $quantity;

        $productDetails[] = [
            'name' => $product->name,
            'quantity' => $quantity,
            'amount' => $amount,
            'price' => $product->price,
        ];

        $totalAmount += $amount;
    }

    $buyDate = now();

    // You can customize the format based on your preference
    // For example, 'Y-m-d H:i:s' would be '2022-01-01 12:30:00'
    $buyDateFormatted = $buyDate->format('Y-m-d H:i:s');

    $cart->products()->detach($selectedProductIds);
    // Your checkout logic here...
    foreach ($selectedProducts as $product) {
        if ($product->quantity==0) {
            # code...
            $product->delete();
        }
    }




//     // Build the bill content
    $billContent = "Bill Information:\n";
    $billContent .= "Message: Product(s) checked out successfully!\n";

    foreach ($productDetails as $product) {
        $billContent .= "Product: " . $product['name'] . ", ";
        $billContent .= "Quantity: " . $product['quantity'] . ", ";
        $billContent .= "Price: $" . number_format($product['price'], 2) . ", ";
        $billContent .= "Amount: $" . number_format($product['amount'], 2) . "\n";
    }

    $billContent .= "Total Amount: $" . number_format($totalAmount, 2) . "\n";
    $billContent .= "Buy Date: " . $buyDateFormatted . "\n \n";

    // Determine the file path
    $filePath = storage_path('app/public/reports/bill2.txt');

    // Check if the directory exists
    $directoryPath = storage_path('app/public/reports');
    if (!File::exists($directoryPath)) {
        // If not, create the directory
        File::makeDirectory($directoryPath, 0755, true, true);
    }

    // Write to file
   // File::put($filePath, $billContent);
   File::append($filePath, $billContent);





    return redirect()->route('cart.index')->with('bill',  [
        'message' => 'Product(s) checked out successfully!',
        'details' => $productDetails,
        'totalAmount' => $totalAmount,
        'buyDate' => $buyDateFormatted,

    ]);


}




    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}

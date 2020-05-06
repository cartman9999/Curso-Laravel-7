<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationExampleController extends Controller
{
	/**
	 * Ejemplo 1 
	 */
    function calculateSalePrice_v1(Item $item, $discount = 0) : int
    {
        $price = 0; 

        if ($discount == 0) {
            $price = $item->getPrice();
        }
        else {
            $price = calculateDiscountedPrice($item->getPrice(), $discount);
        }
        
        return $price;
    }   

    function calculateSalePrice_v2(Item $item, $discount = 0) : int
    {
        if ($discount == 0) {
            return $item->getPrice();
        }
        else {
             return calculateDiscountedPrice($item->getPrice(), $discount);
        }
    }

    function calculateSalePrice_v3(Item $item, $discount = 0) : int
    {
        if ($discount == 0) {
            return $item->getPrice();
        }
        return calculateDiscountedPrice($item->getPrice, $discount);
    } 

    function calculateSalePrice_v4(Item $item, $discount = 0) : int
    {
        if ($discount > 0) {
            return calculateDiscountedPrice($item->getPrice, $discount);
        }

        return $item->getPrice();
    }
    // Fin Ejemplo 1

    /**
     * Ejmplo 2
     */
    public function canEdit_v1(User $user) : bool
    {
        $canEdit = false;
        if (($user->getRole() == 3 && $this->getEditorId() == $user->getId()) || $user->getRole() > 5 || ($this->getAuthorId() == $user->getId() && $this->created_at < time() — 2592000)) {
            $canEdit = true;
        }
        return $canEdit;
    }

    public function canEdit_v2(User $user) : bool
    {
        $isEditor = $user->getRole() == 3 && $this->getEditorId() == $user->getId();
        $isAdmin  = $user->getRole() > 5;
        $isAuthor = $this->getAuthorId() == $user->getId();
        $isTooOld = $this->created_at < time() — 2592000;
        
        if ($isEditor || $isAdmin) {
            return true;
        } 
        if ($isAuthor && !$isTooOld) {
            return true;
        } 

        return false;
    }
}
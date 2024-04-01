<?php 

# Available @ https://leetcode.com/problems/find-first-and-last-position-of-element-in-sorted-array/submissions/1219929384

/*Given an array of integers nums sorted in non-decreasing order, find the starting and ending position of a given target value.

If target is not found in the array, return [-1, -1].

You must write an algorithm with O(log n) runtime complexity.

 

Example 1:

Input: nums = [5,7,7,8,8,10], target = 8
Output: [3,4]
Example 2:

Input: nums = [5,7,7,8,8,10], target = 6
Output: [-1,-1]
Example 3:

Input: nums = [], target = 0
Output: [-1,-1]
 

Constraints:

0 <= nums.length <= 105
-109 <= nums[i] <= 109
nums is a non-decreasing array.
-109 <= target <= 109

*/

/*------- Using Built-in Function ------------*

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        
        $result = array_keys($nums,$target);
        
        if(count($result)>1)
        {
        	$arr_length = count($result);
        	return [$result[0],$result[$arr_length-1]];
        }
        else if(count($result)<2)
        {
        	if(!empty($result))
        	{
        		return [$result[0],$result[0]];
        	}
        	else
	        {
	        	return [-1,-1];
	        }
        }
    }
}


$obj = new Solution();

///$nums = [5,7,7,8,8,10];
//$target=8;

//$nums=[5,7,7,8,8,10];
//$target=6;

//$nums=[];
//$target=0;


//$nums=[1];
//$target=1;

$nums=[3,3,3];
$target=3;

$result = $obj->searchRange($nums,$target);


echo "<pre>";
print_r($result);

?>

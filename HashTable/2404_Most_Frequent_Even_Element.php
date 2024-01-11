<?php 
// available @ https://leetcode.com/problems/most-frequent-even-element/submissions/1143219351
/*
###########2404. Most Frequent Even Element###########

Given an integer array nums, return the most frequent even element.

If there is a tie, return the smallest one. If there is no such element, return -1.

 

Example 1:

Input: nums = [0,1,2,2,4,4,1]
Output: 2
Explanation:
The even elements are 0, 2, and 4. Of these, 2 and 4 appear the most.
We return the smallest one, which is 2.
Example 2:

Input: nums = [4,4,4,9,2,4]
Output: 4
Explanation: 4 is the even element appears the most.
Example 3:

Input: nums = [29,47,21,41,13,37,25,7]
Output: -1
Explanation: There is no even element.
 

Constraints:

1 <= nums.length <= 2000
0 <= nums[i] <= 105

*/

class Solution {

/**
 * @param Integer[] $nums
 * @return Integer
 */
function mostFrequentEven($nums) {
    
    $freq_arr = array();

    //counting frequencies of even no
    foreach($nums as $n)
    {
        
        if($n%2==0)
        {
            if(array_key_exists($n,$freq_arr))
            {
                $prev_frequency = $freq_arr[$n];
                $prev_frequency++;
                $freq_arr[$n]=$prev_frequency;
            }
            else
            {
                $freq_arr[$n]=1;
            }
        }

    }//foreach
    
    //no even numbers , return -1
    if(empty($freq_arr)){return -1;}

    $freq_numbers_withKey = array();
    $frequencies_arr = array();

    /*
        - Looping over even array
        - Storing Frequent Number with No of Frequency in array x 
        - checking in x if No of Frequency is already there.
            -> if not there , store it
            -> if there , 
                a) then get the previous Frequent Number by No of Frequency
                b) compare previously stored Frequent Number with current loop Frequent Number & store in x with smallest Frequent Number.


    */

    foreach($freq_arr as $frequence_number=>$no_of_frequency)
    {
        if(!array_key_exists($no_of_frequency,$freq_numbers_withKey))
        {
            $freq_numbers_withKey[$no_of_frequency] = $frequence_number;
            $frequencies_arr[]=$no_of_frequency;
        }
        else
        {
            $tied_key = $freq_numbers_withKey[$no_of_frequency];

            if($tied_key<$frequence_number)
            {
                $freq_numbers_withKey[$no_of_frequency]=$tied_key;
            }
            else
            {
                $freq_numbers_withKey[$no_of_frequency]=$frequence_number;
            }

        }
    }//end foreach
    
   // echo "<pre>";
    //print_r($freq_numbers_withKey);
    
    // echo "<pre>";
   // print_r($frequencies_arr);

    $max_key = 0;

    //finding the max frequency
    	if(count($frequencies_arr)>1)
		{
			for($i=0;$i<count($frequencies_arr);$i++)
	        {
	            for($j=1;$j<count($frequencies_arr);$j++)
	            {
	            	if($i==$j){continue;}
	                if($frequencies_arr[$i]>$frequencies_arr[$j])
	                {
	                    $max_key = $frequencies_arr[$i];
	                }
	                else
	                {
	                    $max_key = $frequencies_arr[$j];
	                }
	            }
	        }
		}
		else
		{
			 $max_key = $frequencies_arr[0];
		}
    //getting the max key
    $max_key = ($max_key!=0)?$max_key:0;
    //return the maximum frequent value 
    return $freq_numbers_withKey[$max_key];
}
}

$sol = new Solution();
$nums =  [0,1,2,2,4,4,1];
//$nums=[4,4,4,9,2,4];
//$nums=[29,47,21,41,13,37,25,7];

var_export($sol->mostFrequentEven($nums));

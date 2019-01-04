# Git branch strategy

## From strat to version 2

```
         *  initial comminit
         |
         *  differents commit for prepare 10
         |
         *  tag 1.0

         |         
         * one or more commit for prepare 2.0
         |
         * tag 2.0
         |          
         \/
        master
```

* The `master` branch contain all releases.  
* Differents temporarys branches is createds for develop bugfix or features for merging (and squash) into `master` by pull request.  
* Work on `master` only for prepare the futur release (in doc by example).

## From the 2.0 tag

The structure of gitflox is used after 2.0
print("f","dnf","nf","knf")
f=""
text=open("result.txt","w+")
dnf=""
for x in range(0,2):
    for y in range(0,2):
        for z in range(0,2):
            for w in range(0,2):
                # d1 = (x or y or not z or w) and  (x or not y or not z or w) and  (not x or y or z or not w) and  (not x or y or not z or w) and  (not x or y or not z or not w) and  (not x or not y or z or not w) and (not x or not y or not z or not w)
                # d2 = (w and not x or not x and not z or not w and not z or x and y and not w)
                # d3 = not x or not x and not w or not x and y and z or not x and not y and not z or y and not x or y and not w or y and z or z and w and not x or y and z and w or not x and not w and not z or not z and not w or not z and not w and not y
                # d4 = not x or y and not w or not z and not w or y and z
                # d5 = (x or y or z) and (not x and not y or z or w or x and y)
                # d6 = x and w or x and y or y and w or z
                # d7 = (not y or not z or x and w or not x and not w) and (not y or z or x and w or not x and not w)
                # d8 = not y or x and w or not x and not w
                # d9 = x and not y and z or z and not y and not w or x and w or not x and z and not w
                # d3=(x or y or w) and (x or not y or z or w) and (not x or y or z or w) and (not x or y or not z or w) and (not x or not y or not z)
                # d4 = (x or y or w) and (x and y or not x and not y or z or w) and (not x or y or not z or w) and (not x or not y or not z)
                # d5 = (x or y or w) and (x and y or not x and not y or z or w) and (not x or not y and w or not z)
                # d6 = (w or x and y or x and z or y and z) and (not x or not y and w or not z)
                # d1=(x or y or z or w) and (x or y or not z or w) and (x or not y or z or w) and (not x or y or z or w) and (not x or y or not z or w) and (not x or not y or not z or w) and (not x or not y or not z or not w)
                # d7=(y or x and z or not w)and(x or not y or z or not w)and(not x or y or not z or not w)and(not x or not y or z)and(x or not y or not z)
                # d8=(y or x and z or not w)and(x or not y or not z and not w)and(not x or z and y or not y and not z or not w and not y or z and not w)
                # d9=(x and y or x and z or not w and x or not w and not y or not z and not w)and(not x or z and y or not y and not z or not w and not y or z and not w)
                # d1 = (x or y or not z or w)and (x or not y or not z or w)and(not x or y or z or not w)and(not x or y or not z or w)and(not x or y or not z or not w)and(not x or not y or z or not w)and(not x or not y or not z or not w)
                # d2 = w and not x or not z and not w or not z and not x or x and y and not w
                # d3 = (x or y or z or w) and (x or y or z or not w) and(x or y or not z or not w) and (x or not y or z or w) and (x or not y or z or not w) and (x or not y or not z or not w) and (not x or y or z or w) and (not x or not y or z or w) and (not x or not y or not z or w)
                # d4 = x and not y and z  or  not y and z and not w  or  x and w  or  not x and z and not w
                # vp1=(z or not w)and(x or not y and not z or w)and(not x or y and not z or w or z and not y)
                # vp2=(z and x or x and not w or not w and not y and not z or w and z)and(not x or y and not z or w or z and not y)
                # vpf = w and z or not x and not y and not z and not w or y and  not z and x and not w
                #print(0+d1,0+d2," ",0+d3,0+d4)
                d2=(not x or y or z or w)and(not x or y or z or not w)and(not x or not y or z or w) and (not x or not y or not z or not w)
                d1=(not x or y and not z and w or z and not y or not w and z)
                d3=x or z and not y or w and not y
                d4 = (x or y or z or w) and (x or not y or z or w) and (x or not y or z or not w) and (x or not y or not z or w) and (x or not y or not z or not w)
                print(d3+0,d4+0)
                # print(x,y,z,w," ",d1," ",d4)#w*(not x) or z*(not w))

# print(d1)



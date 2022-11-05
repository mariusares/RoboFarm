import java.awt.*;

public class Circle extends Shape {
    private int radius;


    public Circle(Color color, boolean filled, int xCenter, int yCenter, int radius) {
        super( color, filled, xCenter, yCenter );
        this.radius = radius;
           }




    @Override
    public void drawShape(Graphics g,  boolean displayShapeName, boolean displayBoundingBox) {

        g.setColor( getColor() );
        if (getFilled()) {
            g.fillOval(getxCenter()-radius, getyCenter()-radius,radius*2,radius*2 );
           // System.out.println(this.toString());
        } else {
            g.drawOval(getxCenter()-radius, getyCenter()-radius,radius*2,radius*2 );

           // System.out.println(this.toString());
        }

        if (displayShapeName)
            drawName( g );

        if (displayBoundingBox)
            drawBoundingBox( g );
    }

    @Override
    public BoundingBox setupBoundingBox() {

        return  new  BoundingBox(new Point(getxCenter()-radius,getyCenter()+radius), new Point(getxCenter()+radius, getyCenter()-radius));
    }

    public void setRadius(int radius) {
        this.radius = radius;
    }

   @Override
    public String toString() {
        return "Circle{" +
                "radius=" + radius +
                ", xCenter=" + xCenter +
                ", yCenter=" + yCenter +
                '}' ;
    }

}
